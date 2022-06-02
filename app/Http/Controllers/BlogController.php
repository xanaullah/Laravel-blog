<?php
namespace App\Http\Controllers;
use App\Models\post;
use Illuminate\Support\str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    public function index(){
        $posts=Post::all();
             return view('blogposts.blog' ,  compact('posts'));
    }
    public function edit($id){ 
        $id=Post::find($id);
        return view('blogposts.edit-blog' , compact('id'));
    }
    public function show($slug){
        $post=post::where('slug' ,  $slug)->first();
        // dd($post);
        return view('blogposts.single-blog' , compact('post'));
    }
    public function create()
{  

    return view('blogposts.create-blog-post');
}

public function store(Request $request){
    
  $request->validate([

      'title'=>'required',
      'image'=>'required',
    'body'=>'required',
  ]);
  $title=$request->input('title');
  $postId=Post::latest()->take(1)->first()->id+1;
$slug=str::slug($title , '-') . '-' .  $postId;
$user_id=Auth::user()->id;
$body=$request->input('body');
$post=new post();
$post->title=$title;
$post->slug=$slug;
$post->user_id=$user_id;
$post->body=$body;
  if($request->file('image')){
    $image=$request->file('image');
    $extension=$image->getClientOriginalExtension();
    $imagepath= 'images/'.Str::random(10) .'.'. $extension;
    $image->move('images',$imagepath);
    $post->imagepath=$imagepath;

    }
    // echo $imagepath; die;
$post->save();
return redirect()->back()->with('message' , "sucessfull added");
  
}
public function update(Request $request , post $post){
    $request->validate([

        'title'=>'required',
        'image'=>'required',
      'body'=>'required',
    ]);

    $title=$request->input('title');
    $postId=$post->id;
    $postId=Post::latest()->take(1)->first()->id+1;
  $slug=str::slug($title , '-') . '-' .  $postId;
  $user_id=Auth::user()->id;
  $body=$request->input('body');
  $post=new post();
  $post->title=$title;
  $post->slug=$slug;
  $post->user_id=$user_id;
  $post->body=$body;
    if($request->file('image')){
      $image=$request->file('image');
      $extension=$image->getClientOriginalExtension();
      $imagepath= 'images/'.Str::random(10) .'.'. $extension;
      $image->move('images',$imagepath);
      $post->imagepath=$imagepath;
  
      }
      // echo $imagepath; die;
  $post->save();
  return redirect();
    
  }
}



