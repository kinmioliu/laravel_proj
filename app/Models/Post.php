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
    public $body;

    public function __construct($document)
    {
        $this->author = $document->matter("author");
        $this->date = $document->matter("date");
        $this->summary = $document->matter("summary");
        $this->body = $document->body();
    }

    public function __toString()
    {
        return $this->body;
    }

    public static function all() {        
        return collect(File::files(resource_path("posts/")))
        ->map(fn($file)=>YamlFrontMatter::parse($file->getContents()))
        ->map(fn($document)=>new Post($document));

        // $files = File::files(resource_path("posts/"));
        // return array_map(fn($file)=>new Post(YamlFrontMatter::parse($file->getContents())), $files);
        // $posts = [];
        // foreach ($files as $file) {
        //     $posts[] = new Post(YamlFrontMatter::parse($file->getContents()));
        // }
        // return $posts;
        // ddd($documents[1]->body());
        // ddd($documents[1]->matter("date"));        
        // ddd($documents[1]->matter("title"));

        // return array_map(fn($file)=>$file->getContents(), $files);
    }

    public static function find($post_name) {
        base_path();
        if (!file_exists($post_path = resource_path("posts/{$post_name}.html"))) {
            throw new ModelNotFoundException();
        }
        return cache()->remember( "post/{post_name}", 5, fn()=> file_get_contents($post_path));;
    }
}
