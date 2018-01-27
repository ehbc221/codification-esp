<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Department;
use Illuminate\Support\Facades\View;

class DepartmentController extends Controller
{
    public function __construct()
    {
        View::share('controller_name', 'Départements');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::getDepartmentsShortList();

        $action_name = 'Liste';
        return view('admin.departments.index', compact(['action_name', 'departments']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action_name = 'Ajouter';
        return view('admin.departments.create', compact(['action_name']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DepartmentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {
        $input = [
            'name' => $request['name']
        ];

        $department = Department::create($input);

        return redirect()->route('admin.departements.show', ['id' => $department->id])
            ->with('success', 'Département ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::findOrFail($id);

        $success = (session('success')) ? session('success') : null;

        $action_name = "Voir";
        return view('admin.departments.show', compact(['action_name', 'department']))
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
        $department = Department::findOrFail($id);

        $action_name = 'Modifier';
        return view('admin.departments.edit', compact(['action_name', 'department']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DepartmentRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentRequest $request, $id)
    {
        $department = Department::findOrFail($id);

        $input = [
            'name' => $request['name']
        ];

        $department->update($input);

        return redirect()->route('admin.departements.show', ['id' => $department->id])
            ->with('success', 'Département modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::findOrFail($id);

        $department->delete();

        return redirect()->route('admin.departements.index')
            ->with('success', 'Département supprimé avec succès.');
    }
}
