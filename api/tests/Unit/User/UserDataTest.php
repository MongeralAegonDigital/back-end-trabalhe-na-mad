<?php
namespace Tests\Unit\User;

use App\Models\User\Data;
use App\Models\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserDataTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * @test
     */
    public function testCreateDataToUser()
    {
        $quantity = 4;

        $datas = factory(Data::class, $quantity)->create();
        $count = $datas->count();

        $data = $datas->random();

        $user = User::find($data->user_cpf);
        $userWithData = $user->data;

        $this->assertNotNull($userWithData);
        $this->assertEquals($count, $quantity);
        $this->assertEquals($userWithData->rg, $data->rg);
        $this->assertEquals($userWithData->salary, $data->salary);
    }
}
