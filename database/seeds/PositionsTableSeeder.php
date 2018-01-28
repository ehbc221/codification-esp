<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = \App\Room::join('lanes', 'rooms.lane_id', 'lanes.id')
            ->join('floors', 'lanes.floor_id', 'floors.id')
            ->join('blocks', 'floors.block_id', 'blocks.id')
            ->select('rooms.id as room_id', 'blocks.name as block_name')
            ->get();
        foreach ($rooms as $room) {
            if (in_array($room->block_name, ['Pavillon A', 'Pavillon B', 'Pavillon C'])) {
                $positions = [
                    [
                        'number' => 1,
                        'room_id' => $room->room_id
                    ],
                    [
                        'number' => 2,
                        'room_id' => $room->room_id
                    ],
                    [
                        'number' => 3,
                        'room_id' => $room->room_id
                    ],
                    [
                        'number' => 4,
                        'room_id' => $room->room_id
                    ]
                ];
                DB::table('positions')->insert($positions);
            }
            else if (in_array($room->block_name, ['Pavillon D', 'Pavillon E'])) {
                $positions = [
                    [
                        'number' => 1,
                        'room_id' => $room->room_id
                    ],
                    [
                        'number' => 2,
                        'room_id' => $room->room_id
                    ],
                    [
                        'number' => 3,
                        'room_id' => $room->room_id
                    ]
                ];
                DB::table('positions')->insert($positions);
            }
            else if ($room->block_name === 'Pavillon F') {
                $positions = [
                    [
                        'number' => 1,
                        'room_id' => $room->room_id
                    ],
                    [
                        'number' => 2,
                        'room_id' => $room->room_id
                    ]
                ];
                DB::table('positions')->insert($positions);
            }
        }
    }
}
