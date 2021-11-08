<?php

namespace App\Models;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post {
    
    public $author;    
    public $date;
    public $summary;
    public $title;
    public $slug;
    public $body;

    // this construct function product an dependence: Post->document, not a good design
    // we can use an proxy or other thing, but the real thing is it seems there is no further requirement that there Post->document relation will change
    // so I choose remain this design.
    public function __construct($document)
    {
        $this->author = $document->matter("author");
        $this->date = $document->matter("date");
        $this->summary = $document->matter("summary");
        $this->title = $document->matter("title");
        $this->slug = $document->matter("slug");
        $this->body = $document->body();
    }

    public function __toString()
    {
        return $this->body;
    }

    public static function all() {
        return cache()->rememberForever("posts_all", 
                    fn()=>collect(File::files(resource_path("posts/")))
                        ->map(fn($file)=>YamlFrontMatter::parse($file->getContents()))
                        ->map(fn($document)=>new Post($document))
                        ->sortBy("date")
                );
    }

    public static function find($slug) {
        return static::all()->firstWhere("slug", $slug);
    }

    public static function findOrFail($slug) {
        $post = Post::find($slug);
        if (is_null($post)) {
            throw new ModelNotFoundException();
        }
        return $post;
    }
}
