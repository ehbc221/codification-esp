<?php

namespace App\Http\Controllers\Admin;

use App\Grade;
use App\Student;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class StudentController extends Controller
{
    public function __construct()
    {
        View::share('controller_name', 'Étudiants');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = User::getStudentsShortList();

        $action_name = 'Liste';
        return view('admin.students.index', compact(['action_name', 'students']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::getStudentProfile($id);
        $grade = Grade::getGrade($student->grade_id);
        $student['grade'] = $grade->department_name . ' - ' . $grade->formation_name . ' - ' . $grade->grade_number;

        $success = (session('success')) ? session('success') : null;

        $action_name = "Voir";
        return view('admin.students.show', compact(['action_name', 'student']))
            ->with('success', $success);
    }

}
