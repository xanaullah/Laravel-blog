@extends('layout');
@section('main')
<main class="container">
      <section id="contact-us">
        <h1>Get in Touch!</h1>

        <!-- contact info -->
        <div class="container col-12">
            @if(session('status'))
            <p style="color: white">{{session('status')}}</p>
            @endif

          <!-- Contact Form -->
          <div class="contact-form">
            <form action="{{route('blog.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              <!-- Name -->
              <label for="name"><span>Title</span></label>
              <input type="text" id="name" name="title" value="{{old('name')}}" />
              @error('title')
               <p style="color:red">{{$message}}</p> 
               @enderror

              <!-- Email -->
              <label for="email"><span>Image</span></label>
              <input type="file" id="" name="image" value="" />
              @error('image')
               <p style="color:red">{{$message}}</p> 
               @enderror

              <!-- Subject -->
             

              <!-- Message -->
              <label for="message"><span>Body</span></label>
              <textarea id="editor1" name="body"></textarea>
              <script>
                        CKEDITOR.replace( 'editor1' );
                </script>

               <!-- Button -->
              <input type="submit" value="Submit" />
            </form>
          </div>
        </div>
      </section>
    </main>
@endsection