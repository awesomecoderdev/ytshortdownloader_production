<?php

namespace App\Jobs;

use App\Models\Short;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessUpdateYoutubeShorts implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $short;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($short)
    {
        $this->short = $short;
        // dd($this->short);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // $short = $this->short["snippet"];
        // $short["vid"] = $this->short["id"];
        // $short["contentDetails"] = $this->short["contentDetails"];
        // $short["statistics"] = $this->short["statistics"];

        // create short
        Short::updateOrCreate([
            "vid" => $this->short["vid"],
        ], $this->short);
    }
}
