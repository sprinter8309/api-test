<?php

namespace Tests\Feature;

use Tests\TestCase;

class ReadTest extends TestCase
{
    public const GET_ALL_CARS_ENDPOINT = '/api/v1/car/all';
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_all_cars_request()
    {
        $response = $this->get(static::GET_ALL_CARS_ENDPOINT);

        $this->assertNotNull($response[0]);
        
        // Всего 6 полей в элементе возвращаемого массива (характеристики + поле текущего владельца)
        $this->assertCount(6, $response[0]); 
        
        $this->assertIsNumeric($response[0]['car_id']);        
    }
}
