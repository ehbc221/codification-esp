<?php

namespace App\Http\Controllers\Admin;

use App\CodificationPeriode;
use App\Http\Requests\CodificationPeriodeRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Jenssegers\Date\Date;

class CodificationPeriodeController extends Controller
{
    public function __construct()
    {
        View::share('controller_name', 'Périodes Codification');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $codification_periodes = CodificationPeriode::getCodificationPeriodesShortList();
        foreach ($codification_periodes as $codification_periode) {
            $codification_periode['start_date'] = new Date($codification_periode['start_date']);
        }

        $action_name = 'Liste';
        return view('admin.codification-periodes.index', compact(['action_name', 'codification_periodes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action_name = 'Ajouter';
        return view('admin.codification-periodes.create', compact(['action_name']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CodificationPeriodeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CodificationPeriodeRequest $request)
    {
        $input = [
            'name' => 'Codification ' . $request['school_year_start'] . '/' . $request['school_year_end'],
            'school_year_start' => $request['school_year_start'],
            'school_year_end' => $request['school_year_end'],
            'start_date' => new Date($request['start_date']),
            'end_date' => new Date($request['end_date'])
        ];

        $block = CodificationPeriode::create($input);

        return redirect()->route('admin.periodes-codifications.show', ['id' => $block->id])
            ->with('success', 'Période de Codification ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $codification_periode = CodificationPeriode::findOrFail($id);

        $success = (session('success')) ? session('success') : null;

        $action_name = "Voir";
        return view('admin.codification-periodes.show', compact(['action_name', 'codification_periode']))
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
        $codification_periode = CodificationPeriode::findOrFail($id);

        $action_name = 'Modifier';
        return view('admin.codification-periodes.edit', compact(['action_name', 'codification_periode']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CodificationPeriodeRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CodificationPeriodeRequest $request, $id)
    {
        $block = CodificationPeriode::findOrFail($id);

        $input = [
            'name' => 'Codification ' . $request['school_year_start'] . '/' . $request['school_year_end'],
            'school_year_start' => $request['school_year_start'],
            'school_year_end' => $request['school_year_end'],
            'start_date' => new Date($request['start_date']),
            'end_date' => new Date($request['end_date'])
        ];

        $block->update($input);

        return redirect()->route('admin.periodes-codifications.show', ['id' => $block->id])
            ->with('success', 'Période de Codification modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $block = CodificationPeriode::findOrFail($id);

        $block->delete();

        return redirect()->route('admin.periodes-codifications.index')
            ->with('success', 'Période de Codification supprimée avec succès.');
    }
}
