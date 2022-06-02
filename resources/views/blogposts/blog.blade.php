@extends('layout')
@section('main')
<main class="container">
      <h2 class="header-title">All Blog Posts</h2>
      <div class="searchbar">
        <form action="">
          <input type="text" placeholder="Search..." name="search" />

          <button type="submit">
            <i class="fa fa-search"></i>
          </button>

        </form>
      </div>
      <div class="categories">
        <ul>
          <li><a href="">Health</a></li>
          <li><a href="">Entertainment</a></li>
          <li><a href="">Sports</a></li>
          <li><a href="">Nature</a></li>
        </ul>
      </div>
      @foreach($posts as $post)
      <section class="cards-blog latest-blog">
        <div class="card-blog-content">
        <div class="post-button">
            <a href="#">Edit</a>
            <form action="" method="">
              <div class="input"> 
                <input type="submit"  value="delete">
            </div>
            </form>
          </div>
        <img src="{{url($post->imagepath)}}" alt="" />
          <p>{{$post->created_at->diffForHumans()}}         
            <span>Written By{{$post->user->name}}</span>
          </p>
          <h4>
            <a href="{{route('single-blog.show' , $post)}}">{{$post->title}}</a>
          </h4>
        </div>
@endforeach
       

        

        <!-- pagination -->
        <div class="pagination" id="pagination">
          <a href="">&laquo;</a>
          <a class="active" href="">1</a>
          <a href="">2</a>
          <a href="">3</a>
          <a href="">4</a>
          <a href="">5</a>
          <a href="">&raquo;</a>
        </div>
      </section>

      <!-- Main footer -->
      <footer class="main-footer">
        <div>
          <a href=""><i class="fab fa-facebook-f"></i></a>
          <a href=""><i class="fab fa-instagram"></i></a>
          <a href=""><i class="fab fa-twitter"></i></a>
        </div>
        <small>&copy 2021 Alphayo Blog</small>
      </footer>
    </main>
@endsection