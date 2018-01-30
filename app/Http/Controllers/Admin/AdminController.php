<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    public function __construct()
    {
        View::share('controller_name', 'Admins');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::getAdminsShortList();

        $action_name = 'Liste';
        return view('admin.admins.index', compact(['action_name', 'admins']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = [
            'admin' => 'Administrateur',
        ];

        $action_name = 'Ajouter';
        return view('admin.admins.create', compact(['action_name', 'roles']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $input = [
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'phone' => $request['phone'],
            'cin' => $request['cin'],
            'matriculation' => $request['matriculation'],
            'confirmed' => true
        ];

        $admin = User::create($input);

        $role_admin = Role::getRole('admin');
        $admin->attachRole($role_admin);

        return redirect()->route('admin.admins.show', ['id' => $admin->id])
            ->with('success', 'Admin ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = User::getUser($id);

        $success = (session('success')) ? session('success') : null;

        $action_name = "Voir";
        return view('admin.admins.show', compact(['action_name', 'admin']))
            ->with('success', $success);
    }

}
