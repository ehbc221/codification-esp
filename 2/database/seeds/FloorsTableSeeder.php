<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FloorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blocs = \App\Block::all();
        foreach ($blocs as $bloc) {
            if (in_array($bloc->name, ['Pavillon A', 'Pavillon B', 'Pavillon C'])) {
                $floors = [
                    [
                        'number' => 0,
                        'block_id' => $bloc->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                    [
                        'number' => 1,
                        'block_id' => $bloc->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                    [
                        'number' => 2,
                        'block_id' => $bloc->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                    [
                        'number' => 3,
                        'block_id' => $bloc->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                ];
                DB::table('floors')->insert($floors);
            }
            else if (in_array($bloc->name, ['Pavillon D', 'Pavillon E'])) {
                $floors = [
                    [
                        'number' => 0,
                        'block_id' => $bloc->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                    [
                        'number' => 1,
                        'block_id' => $bloc->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                    [
                        'number' => 2,
                        'block_id' => $bloc->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                ];
                DB::table('floors')->insert($floors);
            }
            else if (in_array($bloc->name, ['Pavillon F'])) {
                $floors = [
                    [
                        'number' => 0,
                        'block_id' => $bloc->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                    [
                        'number' => 1,
                        'block_id' => $bloc->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                ];
                DB::table('floors')->insert($floors);
            }
        }
    }
}
