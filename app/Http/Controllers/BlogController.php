<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Blog;
use DB;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function addblog(){

        $categories=Category::where('publicationStatus','1')->get();

        return view('admin.blog.addblog',compact('categories'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveblog(Request $request){
        $this->validate($request,[

            'blogTitle'=>'required',
            'categoryId'=>'required',
            'blogDescription'=>'required',
            'publicationStatus'=>'required'

        ]);
        $blog_picture=$request->file('blogPicture');
        $imageName=$blog_picture->getClientOriginalName();
        $directory= 'blog-images/';
        $blog_picture->move($directory,$imageName);

        $image_url=$directory.$imageName;
        $blog= new blog();

        $blog->blogTitle= $request->blogTitle;
        //$blog->authorName=  Auth::user()->name;
        $blog->categoryId= $request->categoryId;
        $blog->blogDescription= $request->blogDescription;
        $blog->blogPicture= $image_url;
        $blog->publicationStatus= $request->publicationStatus;
        $blog->save();

        // blog::create($request->all());
        return redirect('/add-blog')->with('message','blog has been Added successfully');
    }
    public function manageblog(){

        $blogs = DB::table('blogs')
            ->join('categories', 'blogs.categoryId','=', 'categories.id')
            ->select('blogs.*', 'categories.categoryName')
            ->get();
        return view('admin.blog.manageblog',compact('blogs'));
    }

    public function viewblog($id){

        $blogs = DB::table('blogs')
            ->join('categories', 'blogs.categoryId','=', 'categories.id')
            ->select('blogs.*', 'categories.categoryName')
            ->where('blogs.id',$id)
            ->first();
        return view('admin.blog.viewblog',compact('blogs'));

    }

    public function editblog($id){

        $blogs = DB::table('blogs')
            ->join('categories', 'blogs.categoryId','=', 'categories.id')
            ->select('blogs.*', 'categories.categoryName')
            ->where('blogs.id',$id)
            ->first();
        $categories=Category::all();
        return view('admin.blog.editblog',compact('blogs'),compact('categories'));
    }

    public function updateblog(  Request $request){

        //$blog_picture=$request->file('blogPicture');
        //$imageName=$blog_picture->getClientOriginalName();
        //$directory= 'blog-images/';
        //$blog_picture->move($directory,$imageName);

        //$image_url=$directory.$imageName;
        $blog= new blog();

        $blog=blog::find($request->id);
        $blog->update($request->all());
        //$blog->blogTitle=$request->blogTitle;
        //$blog->categoryId=$request->categoryId;
        //$blog->blogDescription=$request->blogDescription;
        //$blog->blogPicture= $image_url;
        //$blog->publicationStatus=$request->publicationStatus;
        //$blog->save();

        return redirect('/manage-blog')->with('message','Your data is updated successfully');
    }

    public function deleteblog($id)
    {
        $blog=blog::find($id);
        $blog->delete();
        return redirect('/manage-blog')->with('message','Your data deleted successfully');

    }

}
