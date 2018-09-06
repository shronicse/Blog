@extends('admin.master')
@section('content')
    <div style="padding-left: 300px">
        @if(Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }} </div>
        @endif
        <h1>Update Category</h1>
        {!! Form::open(['url'=>'update-category','class'=>'form-horizontal','method'=>'POST','name'=>'editForm'])!!}
        {{ csrf_field() }}
        <div class="form-group">
            <label class="control-label col-sm-2" for="categoryName">Category Name:</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="categoryName" placeholder="Enter categoryName" name="categoryName" value="{{$category->categoryName}}">
            </div>
            <div class="col-sm-6">
                <input type="hidden" class="form-control" id="categoryName" placeholder="Enter category Id" name="id" value="{{$category->id}}">
            </div>

        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="categoryDescription">Category Description:</label>
            <div class="col-sm-6">
                <textarea  type="text" class="form-control" id="categoryDescription" placeholder="Enter Category Description" name="categoryDescription"> {{ $category->categoryDescription}}</textarea>
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

        <script>
            document.forms['editForm'].elements['publicationStatus'].value={{ $category->publicationStatus }}
        </script>

    </div>

@endsection