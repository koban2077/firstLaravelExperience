<?php

namespace Tests\Feature;

use App\Models\Product;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_example()
    {
        $response = $this->get('/products');

        $response->assertStatus(200);
    }

    public function testUserCanSeeProductsList()
    {
        $this->get('/products')
            ->assertSee('Products List');
    }

    public function testUserCanCreateProduct()
    {
        $product = Product::factory()->raw();
        $this->post('/products', $product);
        $this->assertDatabaseHas('products', $product);
        $this->get('/products')
            ->assertSee($product['title']);
    }

    public function testUserCanSeeCreateProductForm()
    {
        $this->get('/products/create')
            ->assertSee('Product Create Form');
    }
}
