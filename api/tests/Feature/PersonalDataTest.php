<?php

namespace Tests\Feature;

use App\Models\PersonalData;
use App\Services\Impl\PersonalDataServiceImpl;
use Illuminate\Support\Facades\Artisan;
use Prophecy\PhpUnit\ProphecyTrait;
use Tests\TestCase;

class PersonalDataTest extends TestCase
{
    use ProphecyTrait;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }

    public function test_creating_personal_data_successfully()
    {
        $service = new PersonalDataServiceImpl();
        $faker = PersonalData::factory()->make();
        $faker->user_id = 1;

        $obj = $service->create($faker);

        $this->assertEquals($faker->RG, $obj->RG);
        $this->assertEquals($faker->number, $obj->number);
        $this->assertEquals($faker->ship_date, $obj->ship_date);
        $this->assertEquals($faker->issuing_body, $obj->issuing_body);
        $this->assertEquals($faker->marital_status, $obj->marital_status);
        $this->assertEquals($faker->profession, $obj->profession);
    }

    public function tearDown(): void
    {
        Artisan::call('migrate:reset');
        parent::tearDown();
    }
}
