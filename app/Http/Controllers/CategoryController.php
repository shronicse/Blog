<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function addCategory(){
        return view('admin.category.addcategory');
    }
    public function saveCategory( Request $request){

        $this->validate($request,
            [
                'categoryName'=>'required',
                'categoryDescription'=>'required',
                'publicationStatus'=>'required'

            ]
        );

        Category::create($request->all());
        return redirect('/add-category')->with('message','Item has been Added successfully');
    }
    public function manageCategory(){

        $category=Category::all();
        return view('admin.category.managecategory',compact('category'));
    }

    public function editCategory($id){

        $category=Category::where('id',$id)->first();

        Return view('admin.category.editCategory',compact('category'));
    }


    public function updateCategory( Request $request)
    {

        $category=Category::find($request->id);
        $category->update($request->all());
        //$category->categoryName=$request->categoryName;
        //$category->categoryDescription=$request->categoryDescription;
        //$category->publicationStatus=$request->publicationStatus;
        //$category->save();
        return redirect('/manage-category')->with('message','Your data is updated successfully');
    }

    public function deleteCategory($id)
    {
        $category=Category::find($id);
        $category->delete();
        return redirect('/manage-category')->with('message','Your data deleted successfully');
    }

}
