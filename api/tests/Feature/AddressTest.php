<?php

namespace Tests\Feature;

use App\Models\Address;
use App\Services\Impl\AddressServiceImpl;
use Illuminate\Support\Facades\Artisan;
use Prophecy\PhpUnit\ProphecyTrait;
use Tests\TestCase;

class AddressTest extends TestCase
{
    use ProphecyTrait;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }

    public function test_creating_address_successfully()
    {
        $service = new AddressServiceImpl();
        $faker = Address::factory()->make();
        $faker->user_id = 1;

        $obj = $service->create($faker);

        $this->assertEquals($faker->cep, $obj->cep);
        $this->assertEquals($faker->public_area, $obj->public_area);
        $this->assertEquals($faker->number, $obj->number);
        $this->assertEquals($faker->complement, $obj->complement);
        $this->assertEquals($faker->district, $obj->district);
        $this->assertEquals($faker->city, $obj->city);
        $this->assertEquals($faker->state, $obj->state);
    }

    public function tearDown(): void
    {
        Artisan::call('migrate:reset');
        parent::tearDown();
    }
}
