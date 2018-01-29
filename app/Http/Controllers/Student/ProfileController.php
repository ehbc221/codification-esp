<?php

namespace App\Http\Controllers\Student;

use App\Grade;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentProfileRequest;
use App\Student;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ProfileController extends Controller
{
    public function __construct()
    {
        View::share('controller_name', 'Mon Compte');
    }

    public function show($id)
    {
        if (Auth::user()->id != $id) {
            return response('Vous n\'avez pas accès à cett ressource.', 501);
        }

        $student = Student::getStudentProfile($id);
        $grade = Grade::getGrade($student->grade_id);
        $student['grade'] = $grade->grade_number . ' (' . $grade->department_name . ' - ' . $grade->formation_name . ')';

        $action_name = 'Voir';
        return view('student.profile.show', compact(['action_name', 'student']));
    }

    public function edit($id)
    {
        if (Auth::user()->id != $id) {
            return response('Vous n\'avez pas accès à cett ressource.', 501);
        }

        $student = Student::getStudentProfile($id);
        $student['is_foreign'] = ($student['is_foreign']) ? 'oui' : 'non';
        $grades = Grade::getGradesOptionListToArray();
        $sexes = ['Masculin' => 'Masculin', 'Féminin' => 'Féminin'];

        $action_name = 'Modifier';
        return view('student.profile.edit', compact(['action_name', 'student', 'grades', 'sexes']));
    }

    public function update(StudentProfileRequest $request, $id)
    {
        if (Auth::user()->id != $id) {
            return response('Vous n\'avez pas accès à cett ressource.', 501);
        }

        $user = User::findOrFail($request->input('user_id'));
        $student = Student::findOrFail($id);

        // Save User
        $input = [
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'cin' => $request['cin'],
            'matriculation' => $request['matriculation']
        ];
        if (isset($request['password']) && !empty($request['password'])) $input['password'] = bcrypt($request['password']);
        $user->update($input);

        // Save Student
        $input = [
            'date_of_birth' => $request['date_of_birth'],
            'place_of_birth' => $request['place_of_birth'],
            'sex' => $request['sex'],
            'grade_id' => $request['grade_id'],
            'is_foreign' => ($request['is_foreign'] === 'oui') ? true : false,
            'native_country' => $request['native_country']
        ];
        $student->update($input);

        return redirect()->route('student.profil.show', ['id' => $id])
            ->with('success', 'Compte modifié avec succès.');
    }
}
