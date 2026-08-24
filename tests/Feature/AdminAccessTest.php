<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_from_admin_dashboard(): void
    {
        $this->get('/admin')->assertRedirect('/login');
    }

    public function test_authenticated_user_can_access_admin_dashboard(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/admin')
            ->assertOk();
    }

    public function test_guest_is_redirected_from_admin_products_route(): void
    {
        $this->get('/admin/products')->assertRedirect('/login');
    }
}
