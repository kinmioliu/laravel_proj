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
        $query->when($filters['search'] ?? false, fn($query, $token) =>
            $query
                ->where('title', 'like', '%' . $token . '%')
                ->orWhere('body', 'like', '%' . $token . '%')
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
