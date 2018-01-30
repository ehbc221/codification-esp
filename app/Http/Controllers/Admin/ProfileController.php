<?php

namespace App\Http\Controllers\Admin;

use App\Grade;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProfileRequest;
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

        $admin = User::getUser($id);
        $grade = Grade::getGrade($admin->grade_id);
        $admin['grade'] = $grade->grade_number . ' (' . $grade->department_name . ' - ' . $grade->formation_name . ')';

        $action_name = 'Voir';
        return view('admin.profile.show', compact(['action_name', 'admin']));
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

        $admin = User::getUser($id);
        $admin['is_foreign'] = ($admin['is_foreign']) ? 'oui' : 'non';
        $grades = Grade::getGradesOptionListToArray();
        $sexes = ['Masculin' => 'Masculin', 'Féminin' => 'Féminin'];

        $action_name = 'Modifier';
        return view('admin.profile.edit', compact(['action_name', 'admin', 'grades', 'sexes']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminProfileRequest $request, $id)
    {
        if (Auth::user()->id != $id) {
            return response('Vous n\'avez pas accès à cett ressource.', 501);
        }

        $user = User::findOrFail($request->input('user_id'));
        $admin = User::findOrFail($id);

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

        // Save Admin
        $input = [
            'date_of_birth' => new Date($request['date_of_birth']),
            'place_of_birth' => $request['place_of_birth'],
            'sex' => $request['sex'],
            'grade_id' => $request['grade_id'],
            'is_foreign' => ($request['is_foreign'] === 'oui') ? true : false,
            'native_country' => $request['native_country']
        ];
        $admin->update($input);

        return redirect()->route('admin.profil.show', ['id' => $id])
            ->with('success', 'Compte modifié avec succès.');
    }
}
