<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $codification_periodes = \App\CodificationPeriode::all();
        $students = \App\Student::all()->pluck('id')->toArray();
        $positions = \App\Position::all()->shuffle();
        $reservations = [];
        foreach ($codification_periodes as $codification_periode) {
            $local_positions = $positions->filter()->all();
            shuffle($students);
            for ($i = 0, $count = (int)(count($students) * 0.9); $i < $count; $i++) {
                if (count($local_positions) === 0) continue;
                $reservation = [];
                $reservation['codification_periode_id'] = $codification_periode->id;
                $reservation['student_id'] = $students[$i];
                $reservation['position_id'] = $local_positions[0]['id'];
                $reservation['is_validated'] = (($i % 10) === 0) ? false : true;
                $reservation['created_at'] = now();
                $reservation['updated_at'] = now();
                array_push($reservations, $reservation);
                array_shift($local_positions);
            }
        }
        DB::table('reservations')->insert($reservations);
    }
}
