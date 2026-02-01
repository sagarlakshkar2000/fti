<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('index');
    }

    public function about(Request $request)
    {
        return view('about');
    }

    public function contact(Request $request)
    {
        return view('contact');
    }

    public function blog(Request $request)
    {
        return view('blog');
    }

    public function blogDetail(Request $request)
    {
        return view('blog-detail');
    }
}
