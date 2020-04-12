<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddCouponTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAdd()
    {
        $response = $this->get(url('/api/v1/coupons'));

        $response->assertStatus(200);
    }
}
