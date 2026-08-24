<?php

namespace Tests\Feature;

use App\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PagesResourceTest extends TestCase
{
    use RefreshDatabase;

    public function test_pages_index_is_accessible(): void
    {
        $this->get('/pages')->assertOk();
    }

    public function test_page_can_be_created(): void
    {
        $response = $this->post('/pages', [
            'name' => 'Test page',
            'alias' => 'test-page-' . uniqid(),
            'text' => 'Some content',
        ]);

        $response->assertRedirect('/pages');
        $response->assertSessionHas('message', 'Page created.');
        $this->assertDatabaseHas('pages', ['name' => 'Test page']);
    }

    public function test_page_alias_must_be_unique(): void
    {
        Page::create([
            'name' => 'Existing',
            'alias' => 'existing-alias',
            'text' => 'Body',
        ]);

        $response = $this->post('/pages', [
            'name' => 'Second',
            'alias' => 'existing-alias',
            'text' => 'Body 2',
        ]);

        $response->assertSessionHasErrors(['alias']);
    }

    public function test_page_can_be_updated(): void
    {
        $page = Page::create([
            'name' => 'Old',
            'alias' => 'old-alias-' . uniqid(),
            'text' => 'Old text',
        ]);

        $response = $this->patch('/pages/' . $page->id, [
            'name' => 'Updated',
            'alias' => 'updated-alias-' . uniqid(),
            'text' => 'Updated text',
        ]);

        $response->assertRedirect('/pages');
        $response->assertSessionHas('message', 'Page updated.');
        $this->assertDatabaseHas('pages', ['id' => $page->id, 'name' => 'Updated']);
    }

    public function test_page_can_be_deleted(): void
    {
        $page = Page::create([
            'name' => 'Delete me',
            'alias' => 'delete-me-' . uniqid(),
            'text' => 'Body',
        ]);

        $response = $this->delete('/pages/' . $page->id);

        $response->assertRedirect('/pages');
        $response->assertSessionHas('message', 'Page deleted.');
        $this->assertDatabaseMissing('pages', ['id' => $page->id]);
    }
}
