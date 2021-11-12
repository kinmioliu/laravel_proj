<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Catalogue;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() 
    {    
        return view('posts', [
            'posts'=> Post::latest()->filter(request(['search', 'catalogue']))->get(),
            'catalogues' => Catalogue::all(),
            'currentCatalogue' => Catalogue::firstWhere('name', request('catalogue'))
        ]);
    }

    public function show(Post $post)
    {
        return view('post', ['post'=>$post]);
    }
}
