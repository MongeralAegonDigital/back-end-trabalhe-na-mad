<?php
namespace Tests\Unit\Address;

use App\Models\Address\Address;
use App\Models\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AddressTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * @test
     */
    public function testCreateAddressToUser()
    {
        $quantity = 2;

        $addresses = factory(Address::class, $quantity)->create();
        $count = $addresses->count();

        $address = $addresses->random();

        $user = User::find($address->user_cpf);
        $userWithAddress = $user->address;

        $this->assertNotNull($userWithAddress);
        $this->assertEquals($count, $quantity);
        $this->assertEquals($userWithAddress->address2, $address->address2);
        $this->assertEquals($userWithAddress->cep, $address->cep);
    }
}
