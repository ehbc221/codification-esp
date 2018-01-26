<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CodificationPeriodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate('codification_periodes');

        $codification_periodes = [
            [
                'name' => 'Codification 2016-2017',
                'school_year_start' => 2016,
                'school_year_end' => 2017,
                'start_date' => \Carbon\Carbon::createFromDate(2016, 9, 15),
                'end_date' => \Carbon\Carbon::createFromDate(2016, 11, 15),
            ],
            [
                'name' => 'Codification 2017-2018',
                'school_year_start' => 2017,
                'school_year_end' => 2018,
                'start_date' => \Carbon\Carbon::createFromDate(2017, 9, 15),
                'end_date' => \Carbon\Carbon::createFromDate(2017, 11, 15),
            ],
        ];

        DB::table('codification_periodes')->insert($codification_periodes);

        $this->enableForeignKeys();
    }
}
