<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            [
                'name' => 'Génie Chimique et Biologie Appliquée',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Génie Civil',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Génie Électrique',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Génie Informatique',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Génie Mécanique',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Gestion',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        DB::table('departments')->insert($departments);
    }
}
