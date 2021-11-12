<?php

use App\Http\Controllers\PostController;
use App\Models\Catalogue;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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

Route::get('/', [PostController::class, 'index'])->name('home');

// Route::get('/', function () {
//     $posts = Post::latest();
//     if (request('search')) {
//         $posts->where('title', 'like', '%' . request('search') . '%')
//         ->orWhere('body', 'like', '%' . request('search') . '%');
//     }    

//     return view('posts', [
//             'posts'=> $posts->get(),
//             'catalogues' => Catalogue::all()
//         ]); // 2 query; order by
//     return view('posts', ['posts'=>Post::all()]); // many query
// })->name('home');

Route::get('/post/{post}', [PostController::class, 'show']);
// Route::get('/post/{post}', function (Post $post) { // route model binding
//     return view('post', ['post'=>$post]);
// });

// Route::get('/catalogue/{catalogue}', function (Catalogue $catalogue) {
//     // ddd($catalogue->posts);
//     return view('posts', [
//             'posts'=>$catalogue->posts,
//             'currentCatalogue' => $catalogue,
//             'catalogues' => Catalogue::all()
//         ]);
// });

Route::get('/author/{author}', function (User $author) {
    return view('posts', ['posts' => $author->posts]);
});

// Route::get('/post/{id}', function ($id) {
//     return view('post', ['post'=>Post::findOrFail($id)]);
// });
