<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicRoutesTest extends TestCase
{
    use RefreshDatabase;

    public function test_main_public_routes_return_success(): void
    {
        $this->get('/')->assertOk();
        $this->get('/about')->assertOk();
        $this->get('/contact')->assertOk();
        $this->get('/articles')->assertOk();
    }

    public function test_article_route_returns_404_for_missing_record(): void
    {
        $this->get('/article/999999')->assertNotFound();
    }

    public function test_article_route_returns_success_for_existing_record(): void
    {
        $user = User::factory()->create();

        $article = $user->articles()->create([
            'name' => 'Test article',
            'img' => 'test.jpg',
            'text' => 'Body',
        ]);

        $this->get('/article/' . $article->id)
            ->assertOk()
            ->assertSee('Test article');
    }
}
