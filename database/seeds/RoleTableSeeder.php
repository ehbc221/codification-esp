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
        $role = [
            [
                'name' => 'user',
                'display_name' => 'Simple Utilisateur',
                'description' => 'Un utilisateur connecté.'
            ],
            [
                'name' => 'admin',
                'display_name' => 'Administrateurs',
                'description' => 'Gestion des ressources liées aux administrateurs (et super administrateurs)'
            ],
            [
                'name' => 'super-admin',
                'display_name' => 'Super Administrateurs',
                'description' => 'Gestion des ressources liées aux super administrateurs'
            ]
        ];

        foreach ($role as $key => $value) {
            Role::create($value);
        }
    }
}
