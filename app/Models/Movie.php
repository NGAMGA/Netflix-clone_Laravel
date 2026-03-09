<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'rank', 'title', 'year', 'rating', 'duration', 
        'genres', 'certificate', 'description', 'imdb_url', 'image_url'
    ];

    /**
     * Relation avec les watchlists
     */
    public function watchlists()
    {
        return $this->belongsToMany(Watchlist::class, 'movie_watchlist')
                    ->withPivot('priority')
                    ->withTimestamps();
    }
}