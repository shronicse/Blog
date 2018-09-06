@extends('front.master')
@section('title')
    Home
@endsection
@section('content')
    <div class="mainbar">
        @foreach($blogs as $blog)
        <div class="article">
            <h2><span>{{ $blog->blogTitle }}</span></h2>
            <p class="infopost">Posted on <span class="date">11 sep 2018</span> by <a href="#">Admin</a> &nbsp;&nbsp;|&nbsp;&nbsp; Filed under <a href="#">templates</a>, <a href="#">internet</a> <a href="#" class="com">Comments <span>11</span></a></p>
            <div class="clr"></div>
            <div class="img"><img src="{{ asset($blog->blogPicture) }}" width="177" height="213" alt="" class="fl" /></div>
            <div class="post_content">
                <p>{{ $blog->blogDescription }}</p>
                <p class="spec"><a href="#" class="rm">Read more &raquo;</a></p>
            </div>
            <div class="clr"></div>

        </div>
    @endforeach
        <p class="pages"><small>Page 1 of 2</small> <span>1</span> <a href="#">2</a> <a href="#">&raquo;</a></p>
    </div>
@endsection