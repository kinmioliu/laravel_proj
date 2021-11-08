<?php

use App\Models\Post;
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

Route::get('/', function () {
    //return ["name"=>"jinmou"];
    //return "<h1>jinmou</h1>";
    $posts = Post::all();    
    return view('posts', ['posts'=>$posts]);
});

Route::get('/post/{post_name}', function ($post_name) {
    $post_content = Post::find($post_name);
    return view('post', ['post'=>$post_content]);
    // if (!file_exists($post_path = __DIR__."/../resources/posts/{$post_name}.html")) {
    //     return redirect('/');
    //     return ddd("file {$post_path} is not exist!");
    // }
    // // cache
    // /*
    // $post_content = cache()->remember(
    //     "post/{post_name}", 5, function () use ($post_path) {
    //         var_dump("cache here");
    //         return file_get_contents($post_path);
    //     }
    // );
    // */
    // $post_content = cache()->remember( "post/{post_name}", 5, fn()=> file_get_contents($post_path));    
    // return view('post', ['post'=>$post_content]);
})->where('post_name','[A-z_\-]+'); // if not match then redirect(404)

