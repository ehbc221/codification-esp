<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Ramsey\Uuid\Uuid;

class UserController extends Controller
{
    public function __construct()
    {
        View::share('controller_name', 'Utilisateurs');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $action_name = 'Liste';

        $users = User::getUsersShortList();

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input['name'] = $request['name'];
        $input['email'] = $request['email'];
        $input['password'] = $request['password'];
        $input['confirm_password'] = $request['confirm_password'];
        $input['phone'] = $request['phone'];
        $input['national_identification_number'] = $request['national_identification_number'];
        $input['matriculation'] = $request['matriculation'];
        $input['confirmation_code'] = Uuid::uuid4();

        $user = User::create($input);

        return redirect()->route('users.show', ['id' => $user->id])
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

        $page_subtitle = "Voir";

        $success = session('success');
        if($success) {
            return view('backend.users.show', compact(['user', 'page_subtitle']))
                ->with('success', session('success'));
        }

        return view('admin.users.show', compact(['user', 'page_subtitle']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $action_name = 'Modifier';

        $user = User::findOrFail($id);

        return view('admin.users.edit', compact(['action_name', 'user']));
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
        $input['name'] = $request['name'];
        $input['email'] = $request['email'];
        $input['password'] = $request['password'];
        $input['confirm_password'] = $request['confirm_password'];
        $input['phone'] = $request['phone'];
        $input['national_identification_number'] = $request['national_identification_number'];
        $input['matriculation'] = $request['matriculation'];

        $user = User::findOrFail($id);
        $user->update($input);

        return redirect()->route('users.show', ['id' => $user->id])
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
