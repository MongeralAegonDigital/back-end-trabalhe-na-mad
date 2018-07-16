<?php

use Illuminate\Database\Seeder;

class WorkCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('work_categories')->insert([
            [
                'name' => 'Empregado(a)',
                'order' => 1,
            ],
            [
                'name' => 'Empregador(a)',
                'order' => 2,
            ],
            [
                'name' => 'Autônomo(a)',
                'order' => 3,
            ],
            [
                'name' => 'Outros',
                'order' => 4,
            ]
        ]);
    }
}
