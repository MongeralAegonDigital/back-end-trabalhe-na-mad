<?php
namespace Tests\Feature\External\Postmon;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostmonApiTest extends TestCase
{    
    /**
    * @test
    */
    public function testeFoundAddressFailed()
    {
        $this->json('GET', 'api/address/cep/12345678')
        ->assertSee("[]");
    }

    /**
    * @test
    */
    public function testeFoundAddressSuccess()
    {
        $this->json('GET', 'api/address/cep/24436790')
        ->assertJson([
            'logradouro' => 'Rua Ricardo Campelo'
        ])
        ->assertSeeText("24436790");
    }
}
