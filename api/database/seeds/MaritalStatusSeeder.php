<?php

use Illuminate\Database\Seeder;

class MaritalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marital_statuses')->insert([
            [
                'name' => 'Solteiro(a)',
                'order' => 1,
            ],
            [
                'name' => 'Casado(a)',
                'order' => 2,
            ],
            [
                'name' => 'Viúvo(a)',
                'order' => 3,
            ],
            [
                'name' => 'Na pista pra negócio',
                'order' => 4,
            ]
        ]);
    }
}
