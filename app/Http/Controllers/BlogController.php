<?php
namespace App\Http\Controllers;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index(){
        $posts=Post::all();
             return view('blogposts.blog' ,  compact('posts'));
    }
    public function show($slug){
        $post=post::where('slug' ,  $slug)->first();
        return view('blogposts.single-blog' , compact('post'));
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
$title=$request->input('title');
$slug=str::slug($title , '-');
$user_id=Auth::user()->id;
$body=$request->input('body');
$imagepath= 'storege/' .$request->file('image')->store('postsimages' , 'public');
$post=new post();
$post->title=$title;
$post->slug=$slug;
$post->user_id=$user_id;
$post->body=$body;
$post->imagepath=$imagepath;
$post->save();
return redirect()->back()->with('message' , "sucessfull added");
  
}
}   
