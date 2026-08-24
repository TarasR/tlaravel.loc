<?php

namespace Tests\Unit;

use App\Policies\ArticlePolicy;
use App\Role;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticlePolicyTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_add_article(): void
    {
        $user = User::factory()->create();
        $role = Role::create(['name' => 'Admin']);
        $user->roles()->attach($role->id);

        $policy = new ArticlePolicy();

        $this->assertTrue($policy->add($user));
    }

    public function test_non_admin_cannot_add_article(): void
    {
        $user = User::factory()->create();
        $role = Role::create(['name' => 'User']);
        $user->roles()->attach($role->id);

        $policy = new ArticlePolicy();

        $this->assertFalse($policy->add($user));
    }

    public function test_admin_owner_can_update_article(): void
    {
        $user = User::factory()->create();
        $role = Role::create(['name' => 'Admin']);
        $user->roles()->attach($role->id);

        $article = $user->articles()->create([
            'name' => 'Owned article',
            'img' => 'owned.jpg',
            'text' => 'Owned body',
        ]);

        $policy = new ArticlePolicy();

        $this->assertTrue($policy->update($user, $article));
    }

    public function test_admin_non_owner_cannot_update_article(): void
    {
        $owner = User::factory()->create();
        $admin = User::factory()->create();
        $role = Role::create(['name' => 'Admin']);
        $admin->roles()->attach($role->id);

        $article = $owner->articles()->create([
            'name' => 'Not owned',
            'img' => 'not-owned.jpg',
            'text' => 'Text',
        ]);

        $policy = new ArticlePolicy();

        $this->assertFalse($policy->update($admin, $article));
    }
}
