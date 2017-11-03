<?php
namespace Tests\Feature\User;

use App\Models\Address\Address;
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
    public function testCreateUserFailed()
    {
        $address = [
            'cep' => '24456780',
            'street' => 'Rua tal',
            'number' => 10,
            'address2' => 'complemento',
            'neighbor' => 'bairro',
            'city' => 'RJ',
            'state' => 'RJ'
        ];

        $data = [
            'rg' => 26528789,
            'org' => 'DETRAN',
            'date_expedition' => \Carbon\Carbon::now(),
            'marital_status' => 'Solteiro',
            'category' => 'Outros',
            'occupation' => 'DEV',
            'salary' => '5500'
        ];

        $wrongUser = [
            'cpf' => "string",
            'name' => "Name",
            'date_birth' => \Carbon\Carbon::now(),
            'email' => 'email@email.com',
            'phone' => '(21)9999-9999',
            'password' => bcrypt('123456'),
            'address' => $address,
            'data' => $data
        ];

        $this->json('POST', 'api/users', $wrongUser)
        ->assertStatus(400)
        ->assertSee("cpf")
        ->assertDontSee("email");
    }
    
    /**
    * @test
    */
    public function testCreateUserSuccess()
    {
        $address = [
            'cep' => '24456780',
            'street' => 'Rua tal',
            'number' => 10,
            'address2' => 'complemento',
            'neighbor' => 'bairro',
            'city' => 'RJ',
            'state' => 'RJ'
        ];

        $data = [
            'rg' => 26528789,
            'org' => 'DETRAN',
            'date_expedition' => \Carbon\Carbon::now(),
            'marital_status' => 'Solteiro',
            'category' => 'Outros',
            'occupation' => 'DEV',
            'salary' => '5500'
        ];

        $wrongUser = [
            'cpf' => "15355578945",
            'name' => "Name",
            'date_birth' => \Carbon\Carbon::now(),
            'email' => 'email@email.com',
            'phone' => '(21)9999-9999',
            'password' => bcrypt('123456'),
            'address' => $address,
            'data' => $data
        ];

        $this->json('POST', 'api/users', $wrongUser)
        ->assertStatus(200);
    }
    
    /**
    * @test
    */
    public function testCreateUserAddressError()
    {
        $address = [
            'cep' => 'aqui-nao-e-string',
            'street' => 'Rua tal',
            'number' => 10,
            'address2' => 'complemento',
            'neighbor' => 'bairro',
            'city' => 'RJ',
            'state' => 'RJ'
        ];

        $data = [
            'rg' => 26528789,
            'org' => 'DETRAN',
            'date_expedition' => \Carbon\Carbon::now(),
            'marital_status' => 'Solteiro',
            'category' => 'Outros',
            'occupation' => 'DEV',
            'salary' => '5500'
        ];

        $wrongUser = [
            'cpf' => 15344455565,
            'name' => "Name",
            'date_birth' => \Carbon\Carbon::now(),
            'email' => 'email@email.com',
            'phone' => '(21)9999-9999',
            'password' => bcrypt('123456'),
            'address' => $address,
            'data' => $data
        ];

        $this->json('POST', 'api/users', $wrongUser)
        ->assertStatus(400)
        ->assertSee("cep");
    }
}
