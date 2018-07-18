<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {

        $response = $this->get('/admin/categorias');

        $response->assertSuccessful();
        $response->assertViewIs('admins.categories.index');
    }
}
