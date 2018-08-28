<?php

namespace Tests\Feature;

use Tests\TestCase;

class IntegerToRomanTest extends TestCase
{

    /**
     * @test
     */
    public function test_user_can_browse_records()
    {
        $convert = factory('App\Convert')->create();
        $this->get(route('api.index'))
            ->assertSee($convert->convertered);
    }

    /**
     * @test
     */
    public function test_user_can_browse_top_10_records()
    {
        $this->get(route('api.top'))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function test_user_can_post_integer()
    {
        $data = factory('App\Convert')->create();
        $this->post(route('api.store'), ['integer' => $data->integer])
            ->assertSee($data->converted);
    }

    /**
     * @test
     */
    public function test_user_cannot_post_string()
    {
        $faker = \Faker\Factory::create();

        $this->post(route('api.store'), ['integer' => $faker->paragraph])
            ->assertSee('The integer must be an integer');
    }
}
