<?php
namespace Tests\Unit\User;

use App\Models\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function testCreateUser()
    {
        $user = factory(User::class)->create();
        $cpf = $user->cpf;

        $userCreated = User::where('cpf', $cpf)->first();

        $this->assertNotNull($userCreated);
        $this->assertEquals($user->name, $userCreated->name);
        $this->assertEquals($user->email, $userCreated->email);
    }
}
