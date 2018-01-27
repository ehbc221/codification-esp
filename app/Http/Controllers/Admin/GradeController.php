<?php

namespace App\Http\Controllers\Admin;

use App\Formation;
use App\Grade;
use App\Http\Requests\GradeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class GradeController extends Controller
{
    public function __construct()
    {
        View::share('controller_name', 'Niveaux');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::getGradesShortList();
        foreach ($grades as $grade) {
            $grade['formation_name'] = $grade['formation_name'] . ' (' . $grade['department_name'] . ')';
        }

        $action_name = 'Liste';
        return view('admin.grades.index', compact(['action_name', 'grades']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formations = $this->getFormationsOptionListToArray();

        $action_name = 'Ajouter';
        return view('admin.grades.create', compact(['action_name', 'formations']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GradeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(GradeRequest $request)
    {
        $input = [
            'number' => $request['number'],
            'formation_id' => $request['formation_id']
        ];

        $grade = Grade::create($input);

        return redirect()->route('admin.niveaux.show', ['id' => $grade->id])
            ->with('success', 'Niveau ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grade = Grade::getGrade($id);
        $grade['formation_name'] = $grade['formation_name'] . ' (' . $grade['department_name'] . ')';

        $success = (session('success')) ? session('success') : null;

        $action_name = "Voir";
        return view('admin.grades.show', compact(['action_name', 'grade']))
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
        $grade = Grade::findOrFail($id);

        $formations = $this->getFormationsOptionListToArray();

        $action_name = 'Modifier';
        return view('admin.grades.edit', compact(['action_name', 'grade', 'formations']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param GradeRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(GradeRequest $request, $id)
    {
        $grade = Grade::findOrFail($id);

        $input = [
            'number' => $request['number'],
            'formation_id' => $request['formation_id']
        ];

        $grade->update($input);

        return redirect()->route('admin.niveaux.show', ['id' => $grade->id])
            ->with('success', 'Niveau modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grade = Grade::findOrFail($id);

        $grade->delete();

        return redirect()->route('admin.niveaux.index')
            ->with('success', 'Niveau supprimé avec succès.');
    }

    private function getFormationsOptionListToArray()
    {
        $formations = Formation::getFormationsOptionList();
        $formations = $formations->mapWithKeys(function ($item) {
            return [$item['id'] => $item['name'] = $item['formation_name'] . ' - ' . $item['department_name']];
        })->toArray();
        return $formations;
    }

}
