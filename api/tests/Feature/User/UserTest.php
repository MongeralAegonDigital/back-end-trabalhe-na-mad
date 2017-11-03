<?php
namespace Tests\Feature\User;

use App\Models\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function testListUsers()
    {
        $quantity = 10;
        $users = factory(User::class, $quantity)->create();

        $this->get( route('users.index') )
        ->assertStatus(200);
    }
    
    /**
    * @test
    */
    public function testCreateUser()
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
