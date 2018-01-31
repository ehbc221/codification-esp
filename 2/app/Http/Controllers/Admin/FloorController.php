<?php

namespace App\Http\Controllers\Admin;

use App\Block;
use App\Floor;
use App\Http\Requests\FloorRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class FloorController extends Controller
{
    public function __construct()
    {
        View::share('controller_name', 'Étages');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $floors = Floor::getFloorsShortList();

        $action_name = 'Liste';
        return view('admin.floors.index', compact(['action_name', 'floors']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blocks = Block::getBlocksOptionListToArray();

        $action_name = 'Ajouter';
        return view('admin.floors.create', compact(['action_name', 'blocks']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FloorRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FloorRequest $request)
    {
        $input = [
            'number' => $request['number'],
            'block_id' => $request['block_id']
        ];

        $floor = Floor::create($input);

        return redirect()->route('admin.etages.show', ['id' => $floor->id])
            ->with('success', 'Étage ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $floor = Floor::getFloor($id);

        $success = (session('success')) ? session('success') : null;

        $action_name = "Voir";
        return view('admin.floors.show', compact(['action_name', 'floor']))
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
        $floor = Floor::findOrFail($id);

        $blocks = Block::getBlocksOptionListToArray();

        $action_name = 'Modifier';
        return view('admin.floors.edit', compact(['action_name', 'floor', 'blocks']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FloorRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(FloorRequest $request, $id)
    {
        $floor = Floor::findOrFail($id);

        $input = [
            'number' => $request['number'],
            'block_id' => $request['block_id']
        ];

        $floor->update($input);

        return redirect()->route('admin.etages.show', ['id' => $floor->id])
            ->with('success', 'Étage modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $floor = Floor::findOrFail($id);

        $floor->delete();

        return redirect()->route('admin.etages.index')
            ->with('success', 'Étage supprimé avec succès.');
    }

}
