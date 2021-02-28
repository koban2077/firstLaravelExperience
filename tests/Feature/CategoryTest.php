<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{

    public function testCategoryEmpty()
    {
        $this->get('/categories')->assertSee('No products');
    }

    public function testUserCanSeeCategory()
    {
        $product = Category::factory()->create();

        $this->get('/categories')
            ->assertSee($product->title);
    }

    public function testCreateCategory()
    {
        $category = Category::factory()->raw();

        $this->post('/categories', $category);

        $this->assertDatabaseHas('categories', $category);

        $this->get('/categories')
            ->assertSee($category['title']);
    }

    public function testUserCanSeeCreateForm()
    {
        $this->get('/categories/create')
            ->assertSee('Category Creation Form');
    }

    public function testCreateCategoryRequiredFields()
    {
        $this->post('/categories')
            ->assertSessionHasErrors(['title', 'description']);
    }

    public function testUserCanSeeUpdateForm()
    {
        $category = Category::factory()->create();

        $this->get("/categories/{$category['id']}")
            ->assertSee('Update Form');
    }

    public function testUserCanUpdateCategory()
    {

        $category = Category::factory()->create();

        $uri = "/categories/{$category['id']}";
        $this->get($uri)
            ->assertSee('Update Form');

        $categoryTest = Category::factory()->raw();
        $this->post($uri, $categoryTest);

        $this->get($uri)
            ->assertSee($categoryTest['title']);
    }

    public function testUserCanDeleteCategory()
    {
        $category = Category::factory()->create();

        $this->get("/categories/delete/{$category['id']}");

        $this->get('/categories')->assertDontSeeText($category['title']);
    }
}
