<?php

namespace Tests\Feature;

use Tests\TestCase;

class ManageTest extends TestCase
{
    public const CREATE_CAR_ENDPOINT = '/api/v1/car';
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_car_create()
    {
        $response = $this->post(static::CREATE_CAR_ENDPOINT, [
            'brand'=>'test_brand',
            'model'=>'test_model',
            'color'=>'test_color',
            'number'=>'test' . mt_rand(1, 9999),
        ]);
              
        $response->assertStatus(200);
    }
}
