<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactCotroller;
use App\Http\Controllers\WeclomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Welcome Page
Route::get('/' , [WeclomeCOntroller::class , 'index'])->name('welcome.index');
//blog page
Route::get('/blog' , [BlogController::class , 'index'])->name('blog.index');
// create post



Route::get('/blog/create' , [BlogController::class , 'create'])->name('blog.create')->middleware('auth');
// Single blog post
Route::get('blog/{id} ' , [BlogController::class , 'edit'])->name('blog.edit');
//update data
Route::post('/blog/update' , [BlogController::class , 'store'])->name('blog.update');


Route::get('/blog/{post:slug}', [BlogController::class , 'show'])->name('single-blog.show');
//contact page 
Route::get('/contact' , [ContactCotroller::class , 'index'])->name('contact.index');

// Store posts
Route::post('/blog/store' , [BlogController::class , 'store'])->name('blog.store');

///delete  post
route::post('blog{id}/delete' , [BlogController::class , 'delete'])->name('blog.delete');



//About us page
route::get('/baout' ,  function(){
   return view('about');
})->name('about');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
