<?php

use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Client::class, 10)->create()->each(function ($client) {
            $client->phones()->save(factory(App\Phone::class)->make());
            $client->address()->save(factory(App\Address::class)->make());
            $client->professionalData()->save(factory(App\ProfessionalData::class)->make());
        });
    }
}
