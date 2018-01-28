<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $formations = \App\Formation::all();
        foreach ($formations as $formation) {
            if (in_array($formation->name, ['Licence'])) {
                $grades = [
                    [
                        'number' => 1,
                        'formation_id' => $formation->id
                    ]
                ];
            DB::table('grades')->insert($grades);
            }
            else if (in_array($formation->name, ['DUT et DST', 'DUT', 'Master', 'Formation à la carte', 'DEC, DSC et DSECG', 'DESCAF'])) {
                $grades = [
                    [
                        'number' => 1,
                        'formation_id' => $formation->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                    [
                        'number' => 2,
                        'formation_id' => $formation->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                ];
            DB::table('grades')->insert($grades);
            }
            else if (in_array($formation->name, ['DIC et DIT', 'DIC'])) {
                $grades = [
                    [
                        'number' => 1,
                        'formation_id' => $formation->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                    [
                        'number' => 2,
                        'formation_id' => $formation->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                    [
                        'number' => 3,
                        'formation_id' => $formation->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                ];
            DB::table('grades')->insert($grades);
            }
        }
    }
}
