@extends('admin.master')

@section('content')

    <div style="padding-left: 300px">

        @if(Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }} </div>
        @endif

        <h1>Update blogs</h1>
        {!! Form::open(['url'=>'update-blog','class'=>'form-horizontal','method'=>'POST','name'=>'editForm','enctype'=>'multipart/form-data',])!!}
        {{ csrf_field() }}
        <div class="form-group">
            <label class="control-label col-sm-2" for="blogTitle">blog Title:</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="blogTitle" placeholder="Enter blogTitle" name="blogTitle" value="{{ $blogs->blogTitle}}">
            </div>
        </div>
        <input type="hidden" class="form-control" id="id" placeholder="blog Id" name="id" value="{{$blogs->id}}">
        <div class="form-group">
            <label class="control-label col-sm-2" for="blogCategory">blog Category:</label>
            <div class="col-sm-6">
                <select class="form-control" name="blogCategory" id="blogCategory">
                    <option>Select blog Category</option>
                    @foreach( $categories as $category)
                        <option value="{{$category->id}}"> {{ $category->categoryName}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="blogDescription">blog Description:</label>
            <div class="col-sm-6">
                <textarea type="text" class="form-control" id="blogDescription" placeholder="Enter blog Description" name="blogDescription" > {{ $blogs->blogDescription}} </textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="publicationStatus">Publication Status:</label>
            <div class="col-sm-6">
                <select class="form-control" name="publicationStatus" id="publicationStatus">
                    <option>Category Status</option>
                    <option value="1">Published</option>
                    <option value="0">Unpublished</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-6">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </div>
        {!! Form::close() !!}
        @include('admin.Errors.errors');

        <script>
            document.forms['editForm'].elements['publicationStatus'].value="{{ $blogs->publicationStatus }}"

        </script>
        <script >
            document.forms['editForm'].elements['blogCategory'].value="{{ $blogs->categoryId}}"
        </script>


    </div>
    }

@endsection
