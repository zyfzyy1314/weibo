<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    //

    public function home()
    {
        $feed_items=[];

        if(Auth::check())
        {
            $feed_items =  Auth::user()->feed()->paginate(30);
        }
            

        return view('static_page.home',compact('feed_items'));
    }

    public function help()
    {
        return view('static_page.help');
    }

    public function about()
    {
        return view('static_page.about');
    }
}
