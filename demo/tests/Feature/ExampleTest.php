<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testNewRoute()
    {
     $response = $this->get('/unit/myname');
        // $response = $this->call('GET', 'TestingController@showName', ["name"=>"myname"]);

     $this->assertTrue($response->isOk(), "Response is not OK");
     $response->assertViewIs('unit');
     $response->assertViewHas('name');

        // $response->assertStatus(200);
 }


/**
* @test
*/
public function mytest()
{
    $a= 4;
    $b=5;
    $c=5*4;

    $this->assertEquals($c,20);
}

}
