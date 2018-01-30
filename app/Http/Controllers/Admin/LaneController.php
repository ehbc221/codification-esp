<?php

namespace App\Http\Controllers\Admin;

use App\Floor;
use App\Http\Requests\LaneRequest;
use App\Lane;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class LaneController extends Controller
{
    public function __construct()
    {
        View::share('controller_name', 'Couloirs');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lanes = Lane::getLanesShortList();
        foreach ($lanes as $lane) {
            $lane['floor_number'] = $lane['block_name'] . ' - Étage ' . $lane['floor_number'];
        }

        $action_name = 'Liste';
        return view('admin.lanes.index', compact(['action_name', 'lanes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lanes = [
            'Droite' => 'Droite',
            'Gauche' => 'Gauche'
        ];
        $floors = Floor::getFloorsOptionListToArray();

        $action_name = 'Ajouter';
        return view('admin.lanes.create', compact(['action_name', 'lanes', 'floors']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LaneRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(LaneRequest $request)
    {
        $input = [
            'name' => $request['name'],
            'floor_id' => $request['floor_id']
        ];

        $lane = Lane::create($input);

        return redirect()->route('admin.couloirs.show', ['id' => $lane->id])
            ->with('success', 'Couloir ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lane = Lane::getLane($id);
        $lane['floor_number'] = $lane['block_name'] . ' - Étage ' . $lane['floor_number'];

        $success = (session('success')) ? session('success') : null;

        $action_name = "Voir";
        return view('admin.lanes.show', compact(['action_name', 'lane']))
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
        $lane = Lane::findOrFail($id);

        $lanes = [
            'Droite' => 'Droite',
            'Gauche' => 'Gauche'
        ];
        $floors = Floor::getFloorsOptionListToArray();

        $action_name = 'Modifier';
        return view('admin.lanes.edit', compact(['action_name', 'lane', 'lanes', 'floors']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param LaneRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(LaneRequest $request, $id)
    {
        $lane = Lane::findOrFail($id);

        $input = [
            'name' => $request['name'],
            'floor_id' => $request['floor_id']
        ];

        $lane->update($input);

        return redirect()->route('admin.couloirs.show', ['id' => $lane->id])
            ->with('success', 'Couloir modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lane = Lane::findOrFail($id);

        $lane->delete();

        return redirect()->route('admin.couloirs.index')
            ->with('success', 'Couloir supprimé avec succès.');
    }

}
