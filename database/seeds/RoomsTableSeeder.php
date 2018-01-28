<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lanes = \App\Lane::join('floors', 'lanes.floor_id', 'floors.id')
            ->join('blocks', 'floors.block_id', 'blocks.id')
            ->select('lanes.id as lane_id', 'lanes.name as lane_name', 'floors.number as floor_number', 'blocks.name as block_name')
            ->get();
        $rooms = [];
        foreach ($lanes as $lane) {
            if (in_array($lane->block_name, ['Pavillon A', 'Pavillon B', 'Pavillon C','Pavillon D', 'Pavillon E', 'Pavillon F'])) {
                $rooms_count_start = 1;
                $rooms_count_end = 0;
                if ($lane->floor_number === 0 && $lane->lane_name === 'Droite') {
                    $rooms_count_start = 1;
                    $rooms_count_end = 14;
                }
                else if ($lane->floor_number === 0 && $lane->lane_name === 'Gauche') {
                    $rooms_count_start = 15;
                    $rooms_count_end = 28;
                }
                else if ($lane->floor_number === 1 && $lane->lane_name === 'Droite') {
                    $rooms_count_start = 29;
                    $rooms_count_end = 42;
                }
                else if ($lane->floor_number === 1 && $lane->lane_name === 'Gauche') {
                    $rooms_count_start = 43;
                    $rooms_count_end = 56;
                }
                for ($i = $rooms_count_start; $i <= $rooms_count_end; $i++) {
                    $room = [
                        'number' => $i,
                        'lane_id' => $lane->lane_id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ];
                    array_push($rooms, $room);
                }
            }
            if (in_array($lane->block_name, ['Pavillon A', 'Pavillon B', 'Pavillon C','Pavillon D', 'Pavillon E'])) {
                $rooms_count_start = 1;
                $rooms_count_end = 0;
                if ($lane->floor_number === 2 && $lane->lane_name === 'Droite') {
                    $rooms_count_start = 57;
                    $rooms_count_end = 70;
                }
                else if ($lane->floor_number === 2 && $lane->lane_name === 'Gauche') {
                    $rooms_count_start = 71;
                    $rooms_count_end = 84;
                }
                for ($i = $rooms_count_start; $i <= $rooms_count_end; $i++) {
                    $room = [
                        'number' => $i,
                        'lane_id' => $lane->lane_id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ];
                    array_push($rooms, $room);
                }
            }
            if (in_array($lane->block_name, ['Pavillon A', 'Pavillon B', 'Pavillon C'])) {
                $rooms_count_start = 1;
                $rooms_count_end = 0;
                if ($lane->floor_number === 3 && $lane->lane_name === 'Droite') {
                    $rooms_count_start = 85;
                    $rooms_count_end = 98;
                }
                else if ($lane->floor_number === 3 && $lane->lane_name === 'Gauche') {
                    $rooms_count_start = 99;
                    $rooms_count_end = 112;
                }
                for ($i = $rooms_count_start; $i <= $rooms_count_end; $i++) {
                    $room = [
                        'number' => $i,
                        'lane_id' => $lane->lane_id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ];
                    array_push($rooms, $room);
                }
            }
        }
        DB::table('rooms')->insert($rooms);
    }
}
