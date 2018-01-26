<?php

use Illuminate\Database\Seeder;
use Zizaco\Entrust\EntrustRole as Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'student',
                'display_name' => 'Étudiant',
                'description' => 'Un Étudiant connecté.'
            ],
            [
                'name' => 'admin',
                'display_name' => 'Administrateurs',
                'description' => 'Gestion des ressources liées aux administrateurs.'
            ]
        ];

        foreach ($roles as $key => $value) {
            Role::create($value);
        }
    }
}
