<?php

namespace Tests\Feature;

use App\Sneaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SneakersTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function check_if_sneaker_list_loads()
    {
        $response = $this->get('/sneakers');
        
        $response->assertSeeText('More Info');
    }

     /** @test */
     public function check_if_sneaker_details_page_loads()
     {
         
         $sneaker = Sneaker::inRandomOrder()->first();
 
         
         $this->get('/sneakers/'. $sneaker->slug)
             ->assertSee($sneaker->name)
             ->assertSee($sneaker->description);
     }

     /** @test */
    public function a_user_creates_a_brand()
    {
        $this->actingAs( factory('App\User')->create() );
        $brand = factory('App\Brand')->create();

        $this->post('/brands', $brand->toArray() );

        $this->assertDatabaseHas('brands', [
            'name'         => $brand->name,
            'slug'          => $brand->slug,
            'url'   => $brand->url,
            'createDate'   => $brand->createDate
        ]);
    }
}    
