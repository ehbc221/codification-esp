<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PositionRequest;
use App\Position;
use App\Http\Controllers\Controller;
use App\Room;
use Illuminate\Support\Facades\View;

class PositionController extends Controller
{
    public function __construct()
    {
        View::share('controller_name', 'Positions');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::getPositionsShortList();
        foreach ($positions as $position) {
            $position['room_number'] = $position['block_name'] . ' - Étage ' . $position['floor_number'] . ' - Couloir ' . $position['lane_name'] . ' - Chambre ' . $position['room_number'];
        }

        $action_name = 'Liste';
        return view('admin.positions.index', compact(['action_name', 'positions']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::getRoomsOptionListToArray();

        $action_name = 'Ajouter';
        return view('admin.positions.create', compact(['action_name', 'rooms']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PositionRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PositionRequest $request)
    {
        $input = [
            'number' => $request['number'],
            'room_id' => $request['room_id']
        ];

        $position = Position::create($input);

        return redirect()->route('admin.positions.show', ['id' => $position->id])
            ->with('success', 'Position ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $position = Position::getPosition($id);
        $position['room_number'] = $position['block_name'] . ' - Étage ' . $position['floor_number'] . ' - Couloir ' . $position['lane_name'] . ' - Chambre ' . $position['room_number'];

        $success = (session('success')) ? session('success') : null;

        $action_name = "Voir";
        return view('admin.positions.show', compact(['action_name', 'position']))
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
        $position = Position::findOrFail($id);

        $rooms = Room::getRoomsOptionListToArray();

        $action_name = 'Modifier';
        return view('admin.positions.edit', compact(['action_name', 'position', 'rooms']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PositionRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PositionRequest $request, $id)
    {
        $position = Position::findOrFail($id);

        $input = [
            'number' => $request['number'],
            'room_id' => $request['room_id']
        ];

        $position->update($input);

        return redirect()->route('admin.positions.show', ['id' => $position->id])
            ->with('success', 'Position modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $position = Position::findOrFail($id);

        $position->delete();

        return redirect()->route('admin.positions.index')
            ->with('success', 'Position supprimée avec succès.');
    }

}
