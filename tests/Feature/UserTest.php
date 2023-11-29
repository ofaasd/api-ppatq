<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testRegisterSuccess(){
        $this->post('/api/users', [
            'name' => 'Abdul Ghofar',
            'email' => 'ofaasd@gmail.com',
            'password' => 'asdasd',
        ])->assertStatus(201)
            ->assertJson([
                'data' => [
                    'name' => 'Abdul Ghofar',
                    'email' => 'ofaasd@gmail.com',
                ]
                ]);


    }
    public function testRegisterFailed(){
        $this->post('/api/users', [
            'name' => '',
            'email' => '',
            'password' => '',
        ])->assertStatus(400)
            ->assertJson([
                'errors' => [
                    'email' => [
                        "The name field is required."
                    ],
                    'password' => [
                        "The password field is required."
                    ],
                    'name' => [
                        "The name field is required."
                    ],
                ]
                ]);
    }
    public function testRegisterUsernameAlreadyExists(){
        $this->testRegisterSuccess();

        $this->post('/api/users', [
            'name' => 'Abdul Ghofar',
            'email' => 'ofaasd@gmail.com',
            'password' => 'asdasd',
        ])->assertStatus(400)
            ->assertJson([
                'errors' => [

                    'email' => 'email already registered',
                ]
                ]);
    }
}
