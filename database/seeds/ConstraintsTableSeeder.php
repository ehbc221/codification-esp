<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConstraintsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate('constraints');

        $codification_periodes = \App\Models\CodificationPeriode::all();

        foreach ($codification_periodes as $codification_periode) {
            $constraints = [
                [
                    'codification_periode_id' => $codification_periode->id,
                    'constraint_from' => 'Batiment',
                    'constraint_from_name' => 'Pavillon A',
                    'constraint_to' => '',
                    'constraint_to_name' => '',
                ],
            ];
        }

        DB::table('constraints')->insert($constraints);

        $this->enableForeignKeys();
    }
}
