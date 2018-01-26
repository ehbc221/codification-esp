<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlocsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate('blocks');

        $blocks = [
            ['name' => 'Pavillon A'],
            ['name' => 'Pavillon B'],
            ['name' => 'Pavillon C'],
            ['name' => 'Pavillon D'],
            ['name' => 'Pavillon E'],
            ['name' => 'Pavillon F'],
        ];

        DB::table('blocks')->insert($blocks);

        $this->enableForeignKeys();
    }
}
