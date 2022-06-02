
@extends('layout')
@section('header')
<header class="header" style="background-image:url({{'images/photography.jpg'}})">
        <div class="header-text">
          <h1>Alphayo Blog</h1>
          <h4>Dashboard of verified news...</h4>
        </div>
        <div class="overlay"></div>
      </header>
      @endsection
   
@section('main')
  <!-- main -->
     <main class="container">
        <h2 class="header-title">Latest Blog Posts</h2>
       
  @foreach($posts as $post)
      <section class="cards-blog latest-blog">
        <div class="card-blog-content">
          @auth
          @if(auth()->user()->id===$post->user->id)
          <div class="post-button">
            <a href="{{route('blog.edit',$post->id)}}">Edit</a>
            <form action="{{route('blog.delete' , $post->id)}}" method="post">
              @csrf 
              @method('delete');
              <div class="input"> 
                <input type="submit"  value="delete">
            </div>
            </form>
          </div>
          @endif
          @endauth
        <img src="{{$post->imagepath}}" alt="" />
          <p>{{$post->created_at->diffForHumans()}}         
            <span>Written By{{$post->user->name}}</span>
          </p>
          <h4>
            <a href="{{route('single-blog.show' , $post)}}">{{$post->title}}</a>
          </h4>
        </div>
@endforeach

@endsection