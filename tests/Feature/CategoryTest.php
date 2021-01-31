<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{

    public function testUserCreateCategory()
    {
        $category = [
            'title' => 'Hello world!',
            'description' => "Some description"
        ];

        $this->post('/categories', $category);

        $this->assertDatabaseHas('categories', $category);

        $this->get('/categories')
            ->assertSee($category['title']);
    }

}
