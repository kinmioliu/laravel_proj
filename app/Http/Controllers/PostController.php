<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Catalogue;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() 
    {   
        return view('posts.index', [
            'posts'=> Post::latest()->filter([
                'author'=>request('author'),
                'catalogue' => request('catalogue'),
                'search' => request('search')
                ])->paginate(6)->withQueryString()
        ]);    
        return view('posts.index', [
            'posts'=> Post::latest()->filter(request('author', 'search', 'catalogue'))->get(),
            // 'catalogues' => Catalogue::all(),
            // 'currentCatalogue' => Catalogue::firstWhere('name', request('catalogue'))
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post'=>$post]);
    }
}
