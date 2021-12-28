<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = collect(['Empregado', 'Empregador', 'Autônomo', 'Outros']);

        $categories->each(function($item) {
            DB::table('categories')->insert([
                'name' => $item
            ]);
        });
    }
}
