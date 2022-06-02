<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class WeclomeCOntroller extends Controller
{
    public function index(){
        $posts=post::latest()->take(4)->get();
        return view('welcome' , compact('posts'));
    }
}
