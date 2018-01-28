<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = \App\Department::all();
        foreach ($departments as $department) {
            if ($department->name === 'Génie Chimique et Biologie Appliquée') {
                $formations = [
                    [
                        'name' => 'DUT et DST',
                        'department_id' => $department->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                    [
                        'name' => 'Licence',
                        'department_id' => $department->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                    [
                        'name' => 'DIC et DIT',
                        'department_id' => $department->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                    [
                        'name' => 'Master',
                        'department_id' => $department->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                ];
            DB::table('formations')->insert($formations);
            }
            else if ($department->name === 'Génie Civil') {
                $formations = [
                    [
                        'name' => 'DUT et DST',
                        'department_id' => $department->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                    [
                        'name' => 'Licence',
                        'department_id' => $department->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                    [
                        'name' => 'DIC et DIT',
                        'department_id' => $department->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                ];
            DB::table('formations')->insert($formations);
            }
            else if ($department->name === 'Génie Électrique') {
                $formations = [
                    [
                        'name' => 'Formation à la carte',
                        'department_id' => $department->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                    [
                        'name' => 'DUT',
                        'department_id' => $department->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                    [
                        'name' => 'Licence',
                        'department_id' => $department->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                    [
                        'name' => 'DIC',
                        'department_id' => $department->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                    [
                        'name' => 'Master',
                        'department_id' => $department->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                ];
            DB::table('formations')->insert($formations);
            }
            else if ($department->name === 'Génie Informatique') {
                $formations = [
                    [
                        'name' => 'DUT et DST',
                        'department_id' => $department->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                    [
                        'name' => 'Licence',
                        'department_id' => $department->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                    [
                        'name' => 'DIC',
                        'department_id' => $department->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                    [
                        'name' => 'Master',
                        'department_id' => $department->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                ];
            DB::table('formations')->insert($formations);
            }
            else if ($department->name === 'Génie Mécanique') {
                $formations = [
                    [
                        'name' => 'DUT',
                        'department_id' => $department->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                    [
                        'name' => 'Licence',
                        'department_id' => $department->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                    [
                        'name' => 'DIC',
                        'department_id' => $department->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                    [
                        'name' => 'Master',
                        'department_id' => $department->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                ];
            DB::table('formations')->insert($formations);
            }
            else if ($department->name === 'Gestion') {
                $formations = [
                    [
                        'name' => 'DUT et DST',
                        'department_id' => $department->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                    [
                        'name' => 'DEC, DSC et DSECG',
                        'department_id' => $department->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                    [
                        'name' => 'Licence',
                        'department_id' => $department->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                    [
                        'name' => 'DESCAF',
                        'department_id' => $department->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                    [
                        'name' => 'Master',
                        'department_id' => $department->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                ];
            DB::table('formations')->insert($formations);
            }
        }
    }
}
