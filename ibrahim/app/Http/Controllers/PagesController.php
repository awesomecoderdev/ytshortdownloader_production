<?php

namespace App\Http\Controllers;

use App\Models\Short;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $shorts = Short::orderBy("id", "DESC")->take(8)->get();
        return view("pages.index", compact("shorts"));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function soon(Request $request)
    {
        return view("pages.soon");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function faq(Request $request)
    {
        return view("pages.faq");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact(Request $request)
    {
        return view("pages.contact");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function privacy(Request $request)
    {
        return view("pages.privacy");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function terms(Request $request)
    {
        return view("pages.terms");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function advertising(Request $request)
    {
        return view("pages.advertising");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function popular(Request $request)
    {
        $shorts = Short::orderBy("downloaded", "DESC")->take(12)->get();
        return view("shorts.popular", compact("shorts"));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function recent(Request $request)
    {
        $shorts = Short::orderBy("id", "DESC")->take(12)->get();
        return view("shorts.recent", compact("shorts"));
    }
}
