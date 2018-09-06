@extends('admin.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @if(Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }} </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">ALL blogS</div>

                    <div class="panel-body">

                        <table class="table">
                            <tr>
                                <th> Blog Title</th>
                                <th> Category Name</th>
                                <th> Blog Description</th>
                                <th>Blog Image </th>
                                <th> Publication Status</th>
                                <th> Action</th>

                            </tr>

                            @foreach($blogs as $blog)
                                <tr>
                                    <td>  {{ $blog->blogTitle }} <br> </td>
                                    <td>  {{ $blog->categoryName }}</td> <br>
                                    <td>  {{ $blog->blogDescription }}</td> <br>
                                    <td> <img src="{{ asset($blog->blogPicture)}}" width="100" height="136" alt="" class="fl"></td>
                                    <td>  {{ $blog->publicationStatus==1 ? 'published':'unpublished' }} <br> </td>
                                    <td> <a href="{{url('edit-blog/'.$blog->id)}}"> Edit</a> <a href="{{ url('delete-blog/'.$blog->id)}}">Delete</a> </td>

                                    </td>

                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection