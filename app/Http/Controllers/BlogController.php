<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
             return view('blogposts.blog');
    }
    public function show(){
        return view('blogposts.single-blog');
    }
    public function create()
{
    return view('blogposts.create-blog-post');
}
public function store(Request $request){
  $request->validate([
      'title'=>'required',
      'image'=>'image|required',
      'body'=>'required'
  ]);
  $post = new post();
  $post->title=$request->title;
  $post->slug

}
}
