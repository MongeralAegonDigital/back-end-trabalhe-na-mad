<?php

namespace Tests\Feature\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserDataTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function testListUserDatas()
    {
        $quantity = 10;
        $users = factory(User::class, $quantity)->create();

        $this->get( route('users.index') )
        ->assertStatus(200);
    }
    
    /**
    * @test
    */
    public function testCreateUserData()
    {
        $wrongUser = [
            'cpf' => "string",
            'name' => "Name",
            'date_birth' => \Carbon\Carbon::now(),
            'email' => 'email@email.com',
            'phone' => '(21)9999-9999',
            'password' => bcrypt('123456')
        ];

        $this->json('POST', 'api/users', $wrongUser)
        ->assertStatus(400)
        ->assertSee("cpf")
        ->assertDontSee("email");
    }
}
