<?php

namespace App\Http\Controllers\Backend;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\PostNotification;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{


    public function index(){
        $categories = Category::all();
        $users = Auth::guard('admin')->user();


        // $posts = Post::all();
        return view('backend.pages.post.index',compact('categories','users'));
    }
    public function create(){
        return view('backend.pages.post.create');
    }
    public function store(Request $request){
        $request->validate([
            'name'  => 'required|max:60',
            'slug'         => 'unique:posts,slug|max:60',
            'category_id' => 'required',
            'description'  => 'required|nullable'
        ]);
        $post = new Post();
        $post->name = $request->name;
        $post->slug = Str::slug($request->slug);
        $post->description  = $request->description;
        $post->category_id   = $request->category_id;
        $post->admin_id       = Auth::guard('admin')->user()->id;
        $post->save();

        $post->notify(new PostNotification($post));
        return back()->with('msg','Post Created Successfully');
    }

}
