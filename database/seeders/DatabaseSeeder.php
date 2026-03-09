<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Movie; 
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      
        $json = file_get_contents(base_path('movies.json'));
        $movies = json_decode($json, true);

        foreach ($movies as $movie) {
            Movie::create([
                'rank'        => $movie['Rank'] ?? null,
                'title'       => $movie['Title'],
                'year'        => $movie['Year'],
                'rating'      => $movie['Rating'],
                'duration'    => $movie['Duration'],
                'genres'      => $movie['Genres'],
                'certificate' => $movie['Certificate'] ?? null,
                'description' => $movie['Description'],
                'imdb_url'    => $movie['IMDb URL'] ?? null,
                'image_url'   => $movie['Image URL'] ?? null,
            ]);
        }
    }
}