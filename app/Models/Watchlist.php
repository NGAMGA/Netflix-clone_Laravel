<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    protected $fillable = ['name', 'user_id'];

public function user()
{
    return $this->belongsTo(User::class);
}

public function movies()
{
    return $this->belongsToMany(Movie::class, 'movie_watchlist')
                ->withPivot('priority')
                ->withTimestamps();
}
}