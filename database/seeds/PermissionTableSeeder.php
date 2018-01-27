<?php

use Illuminate\Database\Seeder;
use Zizaco\Entrust\EntrustPermission as Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
            [
                'name' => 'student-index',
                'display_name' => 'Etudiant - Liste',
                'description' => 'Etudiant - peut voir une liste d\'objets'
            ],
            [
                'name' => 'student-create',
                'display_name' => 'Etudiant - Créer',
                'description' => 'Etudiant - peut créer un objet'
            ],
            [
                'name' => 'student-update',
                'display_name' => 'Etudiant - Modifier',
                'description' => 'Etudiant - peut modifier un objet'
            ],
            [
                'name' => 'student-delete',
                'display_name' => 'Etudiant - Supprimer',
                'description' => 'Etudiant - peut supprimer un objet'
            ],
            [
                'name' => 'student-show',
                'display_name' => 'Etudiant - Voir',
                'description' => 'Etudiant - peut voir un objet'
            ],

            [
                'name' => 'admin-index',
                'display_name' => 'Admin - Liste',
                'description' => 'Admin - peut voir une liste d\'objets'
            ],
            [
                'name' => 'admin-create',
                'display_name' => 'Admin - Créer',
                'description' => 'Admin - peut créer un objet'
            ],
            [
                'name' => 'admin-update',
                'display_name' => 'Admin - Modifier',
                'description' => 'Admin - peut modifier un objet'
            ],
            [
                'name' => 'admin-delete',
                'display_name' => 'Admin - Supprimer',
                'description' => 'Admin - peut supprimer un objet'
            ],
            [
                'name' => 'admin-show',
                'display_name' => 'Admin - Voir',
                'description' => 'Admin - peut voir un objet'
            ]
        ];

        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
    }
}
