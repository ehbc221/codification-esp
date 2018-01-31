<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Jenssegers\Date\Date;

class ProfileController extends Controller
{
    public function __construct()
    {
        View::share('controller_name', 'Mon Compte');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->id != $id) {
            return response('Vous n\'avez pas accès à cett ressource.', 501);
        }

        $user = User::getUser($id);

        $action_name = 'Voir';
        return view('admin.profile.show', compact(['action_name', 'user']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->id != $id) {
            return response('Vous n\'avez pas accès à cett ressource.', 501);
        }

        $user = User::getUser($id);

        $action_name = 'Modifier';
        return view('admin.profile.edit', compact(['action_name', 'user']));
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
        if (Auth::user()->id != $id) {
            return response('Vous n\'avez pas accès à cett ressource.', 501);
        }

        $user = User::findOrFail($id);

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

        // Save User
        $input = [
            'date_of_birth' => new Date($request['date_of_birth']),
            'place_of_birth' => $request['place_of_birth'],
            'sex' => $request['sex'],
            'grade_id' => $request['grade_id'],
            'is_foreign' => ($request['is_foreign'] === 'oui') ? true : false,
            'native_country' => $request['native_country']
        ];
        $user->update($input);

        return redirect()->route('admin.profil.show', ['id' => $id])
            ->with('success', 'Compte modifié avec succès.');
    }
}
