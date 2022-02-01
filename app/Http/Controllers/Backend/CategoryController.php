<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Notifications\CategoryNotification;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('backend.pages.category.index',compact('categories'));
    }
    public function create(){
        return view('backend.pages.category.create');
    }
    public function store(Request $request){
        $request->validate([
            'name'  => 'required|max:50'
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        //Notification
        $category->notify(new CategoryNotification($category));

        return back()->with('msg','Category Created Successfully');
    }
    public function edit($id){
        $category = Category::find($id);
        return view('backend.pages.category.edit',compact('category'));
    }
    public function show($id){
        $category = Category::find($id);
        return view('backend.pages.category.show',compact('category'));

    }
    public function update(Request $request,$id){
        $request->validate([
            'name'  => 'required|max:50'
        ]);
        $category =  Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        return redirect()->route('categories')->with('msg','Category Updated Successfully');
    }
    public function delete($id){
        Category::find($id)->delete();
        return back()->with('msg','Category Deleted Successfully');
    }
}
