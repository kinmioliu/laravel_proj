<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];
    // protected $fillable = ['title', 'author', 'summary', 'body', 'published_at'];

    protected $with = ['catalogue', 'author']; // or without

    public function scopeFilter($query, array $filters)
    {
        // dd($filters);
        // dd($filters['author']);
        /*
        select title 
        from posts 
        where exists(
            select * 
            from catalogues
            where catalogues.id = posts.catalogue_id and catalogues.name = 'family'
        );
        */
        // $users = DB::table('users')
        //    ->whereExists(function ($query) {
        //        $query->select(DB::raw(1))
        //              ->from('orders')
        //              ->whereColumn('orders.user_id', 'users.id');
        //    })
        //    ->get();
        $query->when($filters['search'] ?? false, fn($query, $token) =>
            // fix bug, group where
            $query->where(fn($query)=>
                $query
                    ->where('title', 'like', '%' . $token . '%')
                    ->orWhere('body', 'like', '%' . $token . '%')
            )                
        );
        $query->when($filters['catalogue'] ?? false, fn($query, $catalogue) =>

            // method2
            $query->whereHas('catalogue', fn($query)=> $query->where('name', $catalogue))
            // method 1
            // $query
            //     ->whereExists( fn($query) =>
            //         $query
            //             ->from('catalogues')
            //             ->whereColumn('catalogues.id', 'posts.catalogue_id')
            //             ->where('name', $catalogue)
            //     )
        );

        $query->when($filters['author'] ?? false, fn($query, $author) => 
                $query->whereHas('author', fn($query) => $query->where('username', $author))
        );
    }

    public function catalogue() 
    {
        return $this->belongsTo(Catalogue::class);        
    }

    public function author() 
    {
        return $this->BelongsTo(User::class, 'user_id');
    }
}
