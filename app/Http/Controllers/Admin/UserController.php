<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Ramsey\Uuid\Uuid;

class UserController extends Controller
{
    public function __construct()
    {
        View::share('controller_name', 'Comptes');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::getUsersShortList();

        $action_name = 'Liste';
        return view('admin.users.index', compact(['action_name', 'users']));
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
            'student' => 'Étudiant'
        ];

        $action_name = 'Ajouter';
        return view('admin.users.create', compact(['action_name', 'roles']));
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
            'matriculation' => $request['matriculation']
        ];

        $user = User::create($input);

        $role_admin = Role::getRole('admin');
        $role_student = Role::getRole('student');

        ($request['role'] === 'admin') ? $user->attachRole($role_admin) : $user->attachRole($role_student);

        return redirect()->route('admin.utilisateurs.show', ['id' => $user->id])
            ->with('success', 'Utilisateur ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::getUser($id);

        $success = (session('success')) ? session('success') : null;

        $action_name = "Voir";
        return view('admin.users.show', compact(['action_name', 'user']))
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
        $user = User::findOrFail($id);

        $roles = [
            'admin' => 'Administrateur',
            'student' => 'Étudiant'
        ];

        $action_name = 'Modifier';
        return view('admin.users.edit', compact(['action_name', 'user', 'roles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $input = [
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'cin' => $request['cin'],
            'matriculation' => $request['matriculation']
        ];
        if (isset($request['password']) && !empty($request['password'])) $input['password'] = bcrypt($request['password']);

        $user->update($input);

        return redirect()->route('admin.utilisateurs.show', ['id' => $user->id])
            ->with('success', 'Utilisateur modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('admin.utilisateurs.index')
            ->with('success', 'Utilisateur supprimé avec succès.');
    }
}
