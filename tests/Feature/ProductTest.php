<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
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

    public function testUserCanSeeUpdateProductForm()
    {
        $product = Product::factory()->create();

        $this->get("/products/{$product['id']}")
            ->assertSee('Product Update Form');
    }

    public function testUserCanUpdateProduct()
    {
        $product = Product::factory()->create();

        $newData = [
            'title' => $product['title'] . ' test',
            'description' => $product['description'] . ' test',
            'price' => $product['price']
            ];

        $this->post("/products/{$product['id']}", $newData);

        $this->assertDatabaseHas('products', $newData);
    }

    public function testUserCanDeleteProduct()
    {
        $product = Product::factory()->create();

        $this->get('/products')
            ->assertSee($product['title']);

        $this->get("/products/delete/{$product['id']}");

        $this->get('/products')
            ->assertDontSee($product['title']);
    }
}
