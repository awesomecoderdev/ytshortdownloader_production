<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Cache;

class FontendOperationController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Request
     */
    function changeTheme(Request $request)
    {
        if (Cache::has('theme')) {
            Cache::forget('theme');
            return Response::json(["theme" => Cache::get("theme", "light")]);
        } else {
            Cache::forever('theme', 'dark');
            return Response::json(["theme" => Cache::get("theme")]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Request
     */
    function forbidden(Request $request)
    {
        abort(403);
    }
}
