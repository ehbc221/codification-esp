<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlocsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blocks = [
            [
                'name' => 'Pavillon A',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pavillon B',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pavillon C',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pavillon D',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pavillon E',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pavillon F',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];
        DB::table('blocks')->insert($blocks);
    }
}
