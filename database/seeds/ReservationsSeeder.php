<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate('reservations');

        $codification_periodes = \App\Models\CodificationPeriode::all();
        $students = \App\Models\Student::all()->pluck('id')->toArray();
        $positions = \App\Models\Position::with('room');

        $reservations = [];

        foreach ($codification_periodes as $codification_periode) {
            $local_positions = $positions->filter()->all();
            shuffle($students);
            for ($i = 0, $count = (int)(count($students) * 0.9); $i < $count; $i++) {
                if ($local_positions->count() === 0) break;

                $reservation = [];

                $reservation['codification_periode'] = $codification_periode->id;
                $reservation['student_id'] = $students[$i];
                $reservation['room_id'] = $local_positions->first()->room->id;
                $reservation['position_id'] = $local_positions->first();
                $reservation['is_validated'] = (($i % 10) === 0) ? false : true;

                $local_positions->unshift();
            }
        }

        DB::table('reservations')->insert($reservations);

        $this->enableForeignKeys();
    }
}
