<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CodificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reservations = \App\Reservation::all();
        $codifications = [];
        foreach ($reservations as $reservation) {
            if ($reservation->is_validated) {
                $codification = [];
                $codification['codification_periode_id'] = $reservation->codification_periode_id;
                $codification['student_id'] = $reservation->student_id;
                $codification['position_id'] = $reservation->position_id;
                $codification['created_at'] = now();
                $codification['updated_at'] = now();
                array_push($codifications, $codification);
            }
        }
        DB::table('codifications')->insert($codifications);
    }
}
