<?php

namespace App\Http\Controllers\Admin;

use App\Constraint;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;

class ConstraintController extends Controller
{
    public function __construct()
    {
        View::share('controller_name', 'Contraintes');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $constraints = Constraint::getConstraintsShortList();
        foreach ($constraints as $constraint) {
            $temp = Constraint::getConstraint($constraint->id);
            $constraint->codification_periode_name = $temp->codification_periode_name;
            $constraint->comment = $temp->comment;
            $constraint->constraint_from_name = $temp->constraint_from_name;
            $constraint->constraint_to_name = $temp->constraint_to_name;
        }
        //dd($constraints);

        $action_name = 'Liste';
        return view('admin.constraints.index', compact(['action_name', 'constraints']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $constraint = Constraint::getConstraint($id);

        $success = (session('success')) ? session('success') : null;

        $action_name = "Voir";
        return view('admin.constraints.show', compact(['action_name', 'constraint']))
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
