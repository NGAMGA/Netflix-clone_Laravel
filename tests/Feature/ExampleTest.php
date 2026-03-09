<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Watchlist;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class ExampleTest extends TestCase
{
        use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(Response::HTTP_FOUND);
    }

    // *Test authentification
   // Un utilisateur connecté doit pouvoir accéder à la Watchlist
    public function test_authenticated_user_can_access_watchlist()
{
    $user = User::factory()->create();
    $watchlist = new Watchlist;
    $watchlist->user_id = $user->id;
    $watchlist->name = 'Ma Watchlist';
    $watchlist->save();
    $response = $this->actingAs($user)->get(route('watchlists.show', $watchlist->id));

    $response->assertStatus(Response::HTTP_OK);
}


   // Un utilisateur non connecté ne doit pas avoir accçès à la watchlist


    public function test_guest_cannot_access_watchlist(): void{
        $watchlist = Watchlist::factory()->create();

        $response = $this->get(route('watchlists.show', $watchlist->id));

        $response->assertRedirect(route('login'));
    }
}






