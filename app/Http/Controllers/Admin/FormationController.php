<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Formation;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormationRequest;
use Illuminate\Support\Facades\View;

class FormationController extends Controller
{
    public function __construct()
    {
        View::share('controller_name', 'Formations');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formations = Formation::getFormationsShortList();

        $action_name = 'Liste';
        return view('admin.formations.index', compact(['action_name', 'formations']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::getDepartmentsOptionListToArray();

        $action_name = 'Ajouter';
        return view('admin.formations.create', compact(['action_name', 'departments']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FormationRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormationRequest $request)
    {
        $input = [
            'name' => $request['name'],
            'department_id' => $request['department_id']
        ];

        $formation = Formation::create($input);

        return redirect()->route('admin.formations.show', ['id' => $formation->id])
            ->with('success', 'Formation ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formation = Formation::getFormation($id);

        $success = (session('success')) ? session('success') : null;

        $action_name = "Voir";
        return view('admin.formations.show', compact(['action_name', 'formation']))
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
        $formation = Formation::findOrFail($id);

        $departments = Department::getDepartmentsOptionListToArray();

        $action_name = 'Modifier';
        return view('admin.formations.edit', compact(['action_name', 'formation', 'departments']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FormationRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormationRequest $request, $id)
    {
        $formation = Formation::findOrFail($id);

        $input = [
            'name' => $request['name'],
            'department_id' => $request['department_id']
        ];

        $formation->update($input);

        return redirect()->route('admin.formations.show', ['id' => $formation->id])
            ->with('success', 'Formation modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formation = Formation::findOrFail($id);

        $formation->delete();

        return redirect()->route('admin.formations.index')
            ->with('success', 'Formation supprimée avec succès.');
    }
}
