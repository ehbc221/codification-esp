<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RoomRequest;
use App\Lane;
use App\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class RoomController extends Controller
{
    public function __construct()
    {
        View::share('controller_name', 'Chambres');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::getRoomsShortList();
        foreach ($rooms as $room) {
            $room['lane_name'] = $room['lane_name'] . ' (' . $room['floor_number'] . ' - ' . $room['block_name'] . ')';
        }

        $action_name = 'Liste';
        return view('admin.rooms.index', compact(['action_name', 'rooms']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lanes = Lane::getLanesOptionListToArray();

        $action_name = 'Ajouter';
        return view('admin.rooms.create', compact(['action_name', 'lanes']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoomRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomRequest $request)
    {
        $input = [
            'number' => $request['number'],
            'lane_id' => $request['lane_id']
        ];

        $room = Room::create($input);

        return redirect()->route('admin.chambres.show', ['id' => $room->id])
            ->with('success', 'Chmabre ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::getRoom($id);
        $room['lane_name'] = $room['lane_name'] . ' (' . $room['block_name'] . ' - ' . $room['floor_number'] . ')';

        $success = (session('success')) ? session('success') : null;

        $action_name = "Voir";
        return view('admin.rooms.show', compact(['action_name', 'room']))
            ->with('success', $success);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = Room::findOrFail($id);

        $lanes = Lane::getLanesOptionListToArray();

        $action_name = 'Modifier';
        return view('admin.rooms.edit', compact(['action_name', 'room', 'lanes']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RoomRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoomRequest $request, $id)
    {
        $room = Room::findOrFail($id);

        $input = [
            'number' => $request['number'],
            'lane_id' => $request['lane_id']
        ];

        $room->update($input);

        return redirect()->route('admin.chambres.show', ['id' => $room->id])
            ->with('success', 'Chmabre modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::findOrFail($id);

        $room->delete();

        return redirect()->route('admin.chambres.index')
            ->with('success', 'Chmabre supprimée avec succès.');
    }

}
