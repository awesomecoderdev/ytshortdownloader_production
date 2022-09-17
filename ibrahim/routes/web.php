<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\YoutubeShortsController;
use App\Http\Controllers\FontendOperationController;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| This is operation routes
|--------------------------------------------------------------------------
*/

Route::post('change/theme', [FontendOperationController::class, "changeTheme"])->name("change.theme");
// Route::any('js', [FontendOperationController::class, "forbidden"]);
// Route::any('css', [FontendOperationController::class, "forbidden"]);
// Route::any('img', [FontendOperationController::class, "forbidden"]);
Route::resource("message", MessageController::class)->only("store");
Route::any('errors/403/', [FontendOperationController::class, "forbidden"]);

/*
|--------------------------------------------------------------------------
| This is static pages routes
|--------------------------------------------------------------------------
*/
Route::group(["prefix" => "", "as" => "page.", "namespace" => "", "middleware" => []], function () {
    Route::any('/', [PagesController::class, "index"])->name("index");
    Route::any('soon', [PagesController::class, "soon"])->name("soon");
    Route::any('faq', [PagesController::class, "faq"])->name("faq");
    Route::any('contact-us', [PagesController::class, "contact"])->name("contact");
    Route::any('privacy-policy', [PagesController::class, "privacy"])->name("privacy");
    Route::any('terms-and-conditions', [PagesController::class, "terms"])->name("terms");
    Route::any('advertising', [PagesController::class, "advertising"])->name("advertising");
    Route::any('recent', [PagesController::class, "recent"])->name("recent");
    Route::any('popular', [PagesController::class, "popular"])->name("popular");
    // Route::any('setup', function () {
    //     // Artisan::call("queue:work");
    //     // echo "done";
    //     // $command = 'php-cli ' . base_path() . '/artisan queue:work --timeout=60 --sleep=5 --tries=3 > /dev/null & echo $!'; // 5.6 - see comments
    //     $command = 'php-cli ' . base_path() . '/artisan queue:work > /dev/null & echo $!'; // 5.6 - see comments
    //     $pid = exec($command);

    //     echo $pid;
    // });
});

/*
|--------------------------------------------------------------------------
| This is youtube shorts routes
|--------------------------------------------------------------------------
*/
Route::resource("shorts", YoutubeShortsController::class)->only("index", "show", "store");
Route::post("downloads", [YoutubeShortsController::class, "downloads"])->name("downloads");
Route::post("loadmore", [YoutubeShortsController::class, "loadmore"])->name("loadmore");
