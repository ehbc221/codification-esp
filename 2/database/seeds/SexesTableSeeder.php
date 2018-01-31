<?php

use App\Sex;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SexesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sexes = [
            [
                'name' => 'Masculin',
                'created_at' => now()
            ],
            [
                'name' => 'Féminin',
                'created_at' => now()
            ]
        ];
        DB::table('sexes')->insert($sexes);
    }
}
