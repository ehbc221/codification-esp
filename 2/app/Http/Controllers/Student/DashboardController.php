<?php

namespace App\Http\Controllers\Student;

use App\Student;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $student = Student::getStudentProfile(Auth::user()->id);
        $info = (!$student->grade_id) ? 'Vueillez compléter votre profil pour profiter pleinement des fonctionnalités de cette application.' : null;

        $controller_name = 'Dashboard';
        $action_name = 'Accueil';
        return view('student.dashboard', compact(['controller_name', 'action_name', 'info']));
    }
}
