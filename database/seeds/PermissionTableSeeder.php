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
                'name' => 'user-index',
                'display_name' => 'Utilisateur - Liste',
                'description' => 'Utilisateur - peut voir une liste d\'objets'
            ],
            [
                'name' => 'user-create',
                'display_name' => 'Utilisareur - Créer',
                'description' => 'Utilisareur - peut créer un objet'
            ],
            [
                'name' => 'user-update',
                'display_name' => 'Utilisareur - Modifier',
                'description' => 'Utilisareur - peut modifier un objet'
            ],
            [
                'name' => 'user-delete',
                'display_name' => 'Utilisareur - Supprimer',
                'description' => 'Utilisareur - peut supprimer un objet'
            ],
            [
                'name' => 'user-show',
                'display_name' => 'Utilisateur - Voir',
                'description' => 'Utilisateur - peut voir un objet'
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
            ],
            [
                'name' => 'super-admin-index',
                'display_name' => 'Super Admin - Liste',
                'description' => 'Super Admin - peut voir une liste d\'objets'
            ],
            [
                'name' => 'super-admin-create',
                'display_name' => 'Super Admin - Créer',
                'description' => 'Super Admin - peut créer un objet'
            ],
            [
                'name' => 'super-admin-update',
                'display_name' => 'Super Admin - Modifier',
                'description' => 'Super Admin - peut modifier un objet'
            ],
            [
                'name' => 'super-admin-delete',
                'display_name' => 'Super Admin - Supprimer',
                'description' => 'Super Admin - peut supprimer un objet'
            ],
            [
                'name' => 'super-admin-show',
                'display_name' => 'Super Admin - Voir',
                'description' => 'Super Admin - peut voir un objet'
            ]
        ];

        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
    }
}
