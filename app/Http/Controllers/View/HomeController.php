<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Models\Post;

class HomeController extends Controller
{
    public function index() {
        $posts = Post::with('comments')->get();
        return view('home', ['posts' => $posts]);
    }
}
