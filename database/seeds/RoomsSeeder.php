<?php

use Illuminate\Database\Seeder;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate('roles');

        $roles = [
            ['' => ''],
        ];

        DB::table('roles')->insert($roles);

        $this->enableForeignKeys();
    }
}
