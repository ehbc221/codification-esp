<?php

namespace App\Http\Controllers\Admin;

use App\Block;
use App\Http\Requests\BlockRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class BlockController extends Controller
{
    public function __construct()
    {
        View::share('controller_name', 'Batiments');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blocks = Block::getBlocksShortList();

        $action_name = 'Liste';
        return view('admin.blocks.index', compact(['action_name', 'blocks']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action_name = 'Ajouter';
        return view('admin.blocks.create', compact(['action_name']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BlockRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlockRequest $request)
    {
        $input = [
            'name' => $request['name']
        ];

        $block = Block::create($input);

        return redirect()->route('admin.batiments.show', ['id' => $block->id])
            ->with('success', 'Batiment ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $block = Block::findOrFail($id);

        $success = (session('success')) ? session('success') : null;

        $action_name = "Voir";
        return view('admin.blocks.show', compact(['action_name', 'block']))
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
        $block = Block::findOrFail($id);

        $action_name = 'Modifier';
        return view('admin.blocks.edit', compact(['action_name', 'block']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BlockRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlockRequest $request, $id)
    {
        $block = Block::findOrFail($id);

        $input = [
            'name' => $request['name']
        ];

        $block->update($input);

        return redirect()->route('admin.batiments.show', ['id' => $block->id])
            ->with('success', 'Batiment modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $block = Block::findOrFail($id);

        $block->delete();

        return redirect()->route('admin.batiments.index')
            ->with('success', 'Batiment supprimé avec succès.');
    }
}
