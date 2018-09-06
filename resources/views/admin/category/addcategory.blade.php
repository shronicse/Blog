@extends('admin.master')
@section('content')
    <div style="padding-left: 300px">

        @if(Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }} </div>
        @endif

        <h1>Add Category</h1>
        {!! Form::open(['url'=>'save-category','class'=>'form-horizontal','method'=>'POST'])!!}
        {{ csrf_field() }}
        <div class="form-group">
            <label class="control-label col-sm-2" for="categoryName">Category Name:</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="categoryName" placeholder="Enter categoryName" name="categoryName">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="categoryDescription">Category Description:</label>
            <div class="col-sm-6">
                <textarea type="text" class="form-control" id="categoryDescription" placeholder="Enter categoryDescription" name="categoryDescription"></textarea>
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

        @include('admin.Errors.errors')

    </div>
    }

@endsection