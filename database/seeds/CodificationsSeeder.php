<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CodificationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate('codifications');

        $reservations = \App\Models\Reservation::all();

        $codifications = [];

        foreach ($reservations as $reservation) {
            if ($reservation->is_validated) {
                $codification = [];

                $codification['codification_periode_id'] = $reservations->codification_periode_id;
                $codification['student_id'] = $reservations->student_id;
                $codification['room_id'] = $reservations->room_id;
                $codification['position_id'] = $reservations->position_id;

                array_push($reservations, $reservation);
            }
        }

        DB::table('codifications')->insert($codifications);

        $this->enableForeignKeys();
    }
}
