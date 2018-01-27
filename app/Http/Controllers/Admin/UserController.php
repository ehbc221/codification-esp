<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;
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
        $action_name = 'Ajouter';
        return view('admin.users.create', compact(['action_name']));
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
            'confirmation_code' => Uuid::uuid4()
        ];

        $user = User::create($input);

        $role_student = Role::getRole('student');
        $user->attachRole($role_student);

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
        $user = User::findOrFail($id);

        $success = session('success');
        if($success) {
            return view('admin.users.show', compact(['user', 'page_subtitle']))
                ->with('success', session('success'));
        }

        $action_name = "Voir";
        return view('admin.users.show', compact(['action_name', 'user']));
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

        $action_name = 'Modifier';
        return view('admin.users.edit', compact(['action_name', 'user']));
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
        if (!empty($request['password'])) $input['password'] = bcrypt($request['password']);

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
        User::find($id)->delete();

        return redirect()->route('admin.utilisateurs.index')
            ->with('success', 'Utilisateur supprimé avec succès.');
    }
}
