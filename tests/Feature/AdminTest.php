<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testList()
    {
        $response = $this->get('/admin/administradores');

        $response->assertSuccessful();
        $response->assertViewIs('admin.admins.list');
    }
}
