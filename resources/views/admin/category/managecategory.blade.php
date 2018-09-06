@extends('admin.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @if(Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }} </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">ALL CATAGORIES</div>

                    <div class="panel-body">

                        <table class="table">
                            <tr>
                                <th> Category Name</th>
                                <th> Category Description</th>
                                <th> Category Publication</th>
                                <th> Action</th>

                            </tr>

                            @foreach($category as $category)
                                <tr>
                                    <td>  {{ $category->categoryName }} <br> </td>
                                    <td>  {{ $category->categoryDescription }}</td> <br>
                                    <td>  {{ $category->publicationStatus==1 ? 'published':'unpublished' }} <br>
                                    </td>
                                    <td> <a href="{{ url('/edit-category/'.$category->id )}}">Edit</a> \ <a href="{{ url('/delete-category/'.$category->id )}}"> Delete </a>

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