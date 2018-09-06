@extends('admin.master')

@section('content')

    <div style="padding-left: 300px">

        @if(Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }} </div>
        @endif

        <h1>Add Blogs</h1>
        {!! Form::open(['url'=>'save-blog','class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data'])!!}
        {{ csrf_field() }}
        <div class="form-group">
            <label class="control-label col-sm-2" for="blogTitle">Blog Title:</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="blogTitle" placeholder="Enter Blog Title" name="blogTitle">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="blogCategory">Blog Category:</label>
            <div class="col-sm-6">
                <select class="form-control" name="categoryId" id="categoryId">
                    <option>Select Blog Category</option>
                    @foreach( $categories as $category)
                        <option value="{{$category->id}}"> {{ $category->categoryName}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="blogDescription">Blog Description:</label>
            <div class="col-sm-6">
                <textarea type="text" class="form-control" id="blogDescription" placeholder="Enter Blog Description" name="blogDescription"></textarea>
            </div>
        </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="blogPicture">Blog Picture:</label>
                <div class="col-sm-6">
                    <input type="file" class="form-control" id="blogPicture" name="blogPicture" accept="image/* " >
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
    </div>
    }

@endsection
