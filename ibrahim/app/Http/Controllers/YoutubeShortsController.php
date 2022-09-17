<?php

namespace App\Http\Controllers;

use App\Models\Short;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\StoreShortRequest;
use App\Jobs\ProcessUpdateYoutubeShorts;
use App\Http\Requests\UpdateShortRequest;
use Illuminate\Http\Request;

class YoutubeShortsController extends Controller
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    private $youtube = "https://www.googleapis.com/youtube/v3/videos";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    private $download = "https://www.youtube.com/youtubei/v1/player";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    private $YOUTUBE_API_KEY;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->YOUTUBE_API_KEY = env("YOUTUBE_API_KEY", "AIzaSyD-lhNO1CBtcWy5pMiAJb2f32UocfyrKsI");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shorts = Short::inRandomOrder()->take(12)->get();
        // $shorts = Short::inRandomOrder()->orderBy("title", "ASC")->take(12)->get();
        return view("shorts.index", compact("shorts"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreShortRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShortRequest $request)
    {
        abort_if((($request->short == null) || !isset($request->short)), 404);

        $short = $this->vid($request->short);
        $videoObject = Short::find($short);
        if ($videoObject != null) {
            $downloadedCount = $videoObject->downloaded;
            $videoObject->downloaded = ($videoObject->downloaded + 1);
            $videoObject->save();
        } else {
            $downloadedCount = false;
        }

        $response = Cache::remember("short_{$short}", (60 * 20), function () use ($short, $downloadedCount) {
            $shorts = Http::get($this->youtube, [
                "key" => $this->YOUTUBE_API_KEY,
                "id" => $short,
                "part" => "snippet,contentDetails,statistics",
            ]);

            if ($shorts->successful()) {
                $video = $shorts->json();
                if (!empty($video["items"])) {
                    $shorts = current($video["items"]);
                    $short = $shorts["snippet"];
                    $short["vid"] = $shorts["id"];
                    $short["content_details"] = $shorts["contentDetails"];
                    $short["statistics"] = $shorts["statistics"];
                    $downloaded = isset($shorts["statistics"]["commentCount"]) ? $shorts["statistics"]["commentCount"] : rand(100, 999);
                    $downloaded = ($downloadedCount) ? ($downloadedCount + 1) : abs(($downloaded * 90) / 100);
                    $short["downloaded"] = ($downloaded != 0) ? $downloaded : 1;
                    ProcessUpdateYoutubeShorts::dispatch($short);
                    // create short
                    Short::updateOrCreate([
                        "vid" => $short["vid"],
                    ], $short);
                    return $short;
                }
            } else {
                return false;
            }
        });

        if ($response) {
            return redirect()->route("shorts.show", $this->encode($response["vid"]));
        }

        return redirect()->back()->withInput()->withErrors(['short' => __("Video not found.")]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Short  $short
     * @return \Illuminate\Http\Response
     */
    // public function show(Short $short)
    public function show($video_id)
    {
        $vid = $this->decode($video_id);
        $short = Short::find($vid);
        if ($short == null) {
            $short = Cache::remember("short_{$vid}", (60 * 20), function () use ($vid) {
                $shorts = Http::get($this->youtube, [
                    "key" => $this->YOUTUBE_API_KEY,
                    "id" => $vid,
                    "part" => "snippet,contentDetails,statistics",
                ]);
                if ($shorts->successful()) {
                    $video = $shorts->json();
                    if (!empty($video["items"])) {
                        $shortsArr = current($video["items"]);
                        $outputArr = $shortsArr["snippet"];
                        $outputArr["vid"] = $shortsArr["id"];
                        $outputArr["content_details"] = $shortsArr["contentDetails"];
                        $outputArr["statistics"] = $shortsArr["statistics"];
                        ProcessUpdateYoutubeShorts::dispatch($outputArr);
                        Short::updateOrCreate([
                            "vid" => $outputArr["vid"],
                        ], $outputArr);
                        return $outputArr;
                    }
                } else {
                    return false;
                }
            });
            abort_if(!$short, 404);

            $short = is_array($short) ? json_decode(json_encode($short)) : $short;
        } else {
            // $short->downloaded = $short->downloaded + rand(1, 3);
            // $short->save();
        }

        // echo '<script>';
        // echo 'console.log(' . json_encode($downloads) . ');';
        // echo '</script>';

        $popular = Short::orderBy("downloaded", "DESC")->whereNot("vid", $vid)->take(10)->get();
        $recent = Short::orderBy("id", "DESC")->whereNot("vid", $vid)->take(9)->get();
        return view("shorts.show", compact("short", "popular", "recent",));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Short  $short
     * @return \Illuminate\Http\Response
     */
    public function loadmore(Request $request)
    {
        $option = isset($request->option) ? $request->option : "shorts";
        $paged = isset($request->paged) ? intval($request->paged) : 1;
        $per_page = 12;
        $skip = ($per_page * $paged);

        if ($option == "shorts") {
            $shorts = Short::orderBy("title", "ASC")->skip($skip)->take($per_page)->get();
        } else if ($option == "recent") {
            $shorts = Short::orderBy("id", "DESC")->skip($skip)->take($per_page)->get();
        } else if ($option == "popular") {
            $shorts = Short::orderBy("downloaded", "DESC")->skip($skip)->take($per_page)->get();
        }

        // return view("shorts.shorts", compact("shorts", "paged"));
        return response()
            ->view("shorts.shorts", compact("shorts", "paged"))
            ->header('paged', ($paged + 1));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Short  $short
     * @return \Illuminate\Http\Response
     */
    public function fields($vid)
    {
        $output = [
            'context' => [
                'client' => [
                    'hl' => 'en',
                    'clientName' => 'WEB',
                    'clientVersion' => '2.20210721.00.00',
                    'clientFormFactor' => 'UNKNOWN_FORM_FACTOR',
                    'clientScreen' => 'WATCH',
                    'mainAppWebInfo' => [
                        'graftUrl' => "/watch?v=$vid",
                    ],
                ],
                'user' => [
                    'lockedSafetyMode' => false,
                ],
                'request' => [
                    'useSsl' => true,
                    'internalExperimentFlags' => [],
                    'consistencyTokenJars' => []
                ],
            ],
            'videoId' => $vid,
            'playbackContext' => [
                'contentPlaybackContext' => [
                    'vis' => '0',
                    'splay' => false,
                    'autoCaptionsDefaultOn' => false,
                    'autonavState' => 'STATE_NONE',
                    'html5Preference' => 'HTML5_PREF_WANTS',
                    'lactMilliseconds' => '-1',
                ],
            ],
            'racyCheckOk' => false,
            'contentCheckOk' => false,
        ];

        return $output;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Short  $short
     * @return \Illuminate\Http\Response
     */
    public function downloads(Request $request)
    {
        abort_if(!$request->downloads, 403);
        $vid = $this->decode($request->downloads);
        $short = Short::find($vid);
        if ($short == null) {
            $short = Cache::remember("short_{$vid}", (60 * 20), function () use ($vid) {
                $shorts = Http::get($this->youtube, [
                    "key" => $this->YOUTUBE_API_KEY,
                    "id" => $vid,
                    "part" => "snippet,contentDetails,statistics",
                ]);
                if ($shorts->successful()) {
                    $video = $shorts->json();
                    if (!empty($video["items"])) {
                        $shortsArr = current($video["items"]);
                        $outputArr = $shortsArr["snippet"];
                        $outputArr["vid"] = $shortsArr["id"];
                        $outputArr["content_details"] = $shortsArr["contentDetails"];
                        $outputArr["statistics"] = $shortsArr["statistics"];
                        ProcessUpdateYoutubeShorts::dispatch($outputArr);
                        // Short::updateOrCreate([
                        //     "vid" => $outputArr["vid"],
                        // ], $outputArr);
                        return $outputArr;
                    }
                } else {
                    return false;
                }
            });
            abort_if(!$short, 403);

            $short = is_array($short) ? json_decode(json_encode($short)) : $short;
        } else {
            // $short->downloaded = $short->downloaded + rand(1, 3);
            // $short->save();
        }

        $response = Http::acceptJson()->post("$this->download", $this->fields($vid));
        if ($response->successful()) {
            $video =  $response->object();
            $downloads = isset($video->streamingData) ? $video->streamingData : [];
            $channel = isset($video->videoDetails->channelId) ? $video->videoDetails->channelId : null;

            if ($channel != null) {
                $updateShort = Short::find($vid);
                if ($updateShort->channel === null) {
                    $updateShort->channel = $channel;
                    $updateShort->save();
                }
            }
        } else {
            $downloads = [];
        }
        // $downloads = [];
        $others = [];
        if (!isset($downloads->formats[0]->url)) {
            $response = Http::get("https://api.savetube.me/info?url=https://www.youtube.com/watch?v=$vid");
            if ($response->successful()) {
                $video = $response->object();
                if (isset($video->data->video_formats)) {
                    $others = $video->data->video_formats;
                }
            }
        }

        // return $others;

        return view("shorts.download", compact("short", "downloads", "others"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Short  $short
     * @return \Illuminate\Http\Response
     */
    public function download(Request $request)
    {
        // return $downloads->formats;

        // $thumbnail = end($short->thumbnails);
        // $thumbnail = $thumbnail->url;

        // $ext = File::extension($thumbnail) ?? "mp4";
        // $name = strtok($short->title, '|');
        // $name = strtok($name, '/');
        // $filename = "{$name}__Yt Short Downloader.{$ext}";

        // $thumbnail = "https://rr2---sn-5hne6nzy.googlevideo.com/videoplayback?expire=1653611735&ei=d8iPYouGJqCwx_APkJOz8Ac&ip=65.21.182.238&id=o-AJwJfgN_pRF97W_VzLqMEOsGrR58u5O7MuE8OR9woCia&itag=22&source=youtube&requiressl=yes&mh=TF&mm=31%2C29&mn=sn-5hne6nzy%2Csn-5goeen76&ms=au%2Crdu&mv=m&mvi=2&pl=26&initcwndbps=471250&vprv=1&mime=video%2Fmp4&ratebypass=yes&dur=1525.156&lmt=1610111936500422&mt=1653589740&fvip=5&fexp=24001373%2C24007246&c=ANDROID&txp=5432434&sparams=expire%2Cei%2Cip%2Cid%2Citag%2Csource%2Crequiressl%2Cvprv%2Cmime%2Cratebypass%2Cdur%2Clmt&sig=AOq0QJ8wRQIgHycPr0PM9GEVM0TlZvq9p2AiqM5oAu2towcTEmbZPccCIQDAR7S45nh89XtxtNIYUiuCQSH2O-IvWhflG8Fli3jqnQ%3D%3D&lsparams=mh%2Cmm%2Cmn%2Cms%2Cmv%2Cmvi%2Cpl%2Cinitcwndbps&lsig=AG3C_xAwRQIhAOPZaY5NY4GOx7TgZT9oHdPxhwyUtTf28qF-vwCjFpLYAiBUU-AwxnXyxyR8izQjs2UfXGC8WUtkw1UxRkwCKB4LKA%3D%3D";

        // header('Cache-Control: public');
        // header('Content-Description: File Transfer');
        // header("Content-Disposition: attachment;filename=\"$filename\"");
        // header('Content-Transfer-Encoding: binary');
        // readfile($thumbnail);
        return $request->all();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Short  $short
     * @return \Illuminate\Http\Response
     */
    public function vid($short)
    {
        // $short = preg_replace('/\?.*/', '', $request->short);
        return basename(strtok($short, '?'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Short  $short
     * @return \Illuminate\Http\Response
     */
    public function encode($short)
    {
        return base64_encode("{$short}ibrahim");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Short  $short
     * @return \Illuminate\Http\Response
     */
    public function decode($short)
    {
        return str_replace("ibrahim", "", base64_decode($short));
    }
}
