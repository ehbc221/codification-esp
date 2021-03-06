<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $controller_name = 'Dashboard';
        $action_name = 'Accueil';

        return view('admin.dashboard', compact(['controller_name', 'action_name']));
    }
}
