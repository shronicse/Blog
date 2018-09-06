<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class WelcomeController extends Controller
{
    public function index(){

        $blogs=Blog::where('publicationStatus',1)->paginate(2);
        return view('front.home',['blogs'=>$blogs]);
    }
    public function support(){
        return view('front.support');
    }
    public function about(){
        return view('front.about');
    }
    public function blog(){
        return view('front.blog');
    }
    public function contact(){
        return view('front.contact');
    }

}
