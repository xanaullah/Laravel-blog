@extends('layout');
@section('main')
<main class="container">
      <section id="contact-us">
        <h1>Get in Touch!</h1>

        <!-- contact info -->
        <div class="container col-12">
            

          <!-- Contact Form -->
          <div class="contact-form">
            <form action="" method="">
              <!-- Name -->
              <label for="name"><span>Title</span></label>
              <input type="text" id="name" name="title" value="" />

              <!-- Email -->
              <label for="email"><span>Image</span></label>
              <input type="file" id="email" name="image" value="" />

              <!-- Subject -->
             

              <!-- Message -->
              <label for="message"><span>Body</span></label>
              <textarea id="editor1" name="message"></textarea>
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