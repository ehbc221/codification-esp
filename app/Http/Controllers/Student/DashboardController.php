<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $controller_name = 'Dashboard';
        $action_name = 'Accueil';

        return view('student.dashboard', compact(['controller_name', 'action_name']));
    }
}
