<?php

namespace Tests\Feature;

use App\Models\Address;
use App\Models\PersonalData;
use App\Models\User;
use App\Services\AddressService;
use App\Services\EmailService;
use App\Services\PersonalDataService;
use App\Services\Impl\UserServiceImpl;
use Illuminate\Support\Facades\Artisan;
use Prophecy\Argument;
use Prophecy\PhpUnit\ProphecyTrait;
use Tests\TestCase;

class UserTest extends TestCase
{
    use ProphecyTrait;

    public function setUp(): void
    {
        parent::setUp();
        //Artisan::call('migrate:refresh');
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }

    public function test_invalid_cpf()
    {
        $faker = User::factory()->make();

        $faker->password = '123456';
        $faker->cpf = '515151';
        $this->actingAs($faker)
            ->post('api/users', $faker->toArray(), ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJson([
                'errors' => [
                    'cpf' => [
                        'CPF inválido',
                    ],
                ]
            ]);
    }

    public function test_validation_user_fields()
    {
        $this->json('POST', 'api/users', ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJson([
                'errors' => [
                    'name' => [
                        'O nome é obrigatório',
                    ],
                    'email' => [
                        'O e-mail é obrigatório',
                    ],
                    'password' => [
                        'A senha é obrigatória',
                    ],
                    'cpf' => [
                        'The cpf field is required.',
                    ],
                    'phone' => [
                        'O telefone é obrigatório',
                    ],
                    'birth_date' => [
                        'The birth date field is required.',
                    ],
                    'personal_data.RG' => [
                        'O RG é obrigatório',
                    ],
                    'personal_data.number' => [
                        'O Número é obrigatório',
                    ],
                    'personal_data.ship_date' => [
                        'A Data de Expedição é obrigatório',
                    ],
                    'personal_data.issuing_body' => [
                        'Orgão expedidor é obrigatório',
                    ],
                    'personal_data.marital_status' => [
                        'O Estado Civil é obrigatório',
                    ],
                    'personal_data.category_id' => [
                        'A Categoria é obrigatório',
                    ],
                    'personal_data.profession' => [
                        'Profissão é obrigatório',
                    ],
                    'personal_data.salary' => [
                        'Salário é obrigatório',
                    ],
                    'address.cep' => [
                        'Cep é obrigatório',
                    ],
                    'address.public_area' => [
                        'Logradouro é obrigatório',
                    ],
                    'address.number' => [
                        'Número é obrigatório',
                    ],
                    'address.complement' => [
                        'Complemento é obrigatório',
                    ],
                    'address.district' => [
                        'Bairro é obrigatório',
                    ],
                    'address.city' => [
                        'Cidade é obrigatório',
                    ],
                    'address.state' => [
                        'Estado é obrigatório',
                    ],
                ],
            ]);
    }

    public function test_creating_user_successfully()
    {
        $user = Argument::type(User::class);
        $address = Argument::type(Address::class);
        $personalData = Argument::type(PersonalData::class);

        $addressService = $this->prophesize(AddressService::class);
        $addressService->create($address)->shouldBeCalled();

        $personalDataService = $this->prophesize(PersonalDataService::class);
        $personalDataService->create($personalData)->shouldBeCalled();

        $emailService = $this->prophesize(EmailService::class);
        $emailService->sendEmail($user)->shouldBeCalled();

        $service = new UserServiceImpl(
            $addressService->reveal(),
            $personalDataService->reveal(),
            $emailService->reveal()
        );

        $faker = User::factory()->make();

        $service->create($faker->toArray());
    }

    public function tearDown(): void
    {
        Artisan::call('migrate:reset');
        parent::tearDown();
    }
}
