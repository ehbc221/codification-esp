<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $floors = \App\Floor::all();
        foreach ($floors as $floor) {
            $lanes = [
                [
                    'name' => 'Gauche',
                    'floor_id' => $floor->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Droite',
                    'floor_id' => $floor->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ];
            DB::table('lanes')->insert($lanes);
        }
    }
}
