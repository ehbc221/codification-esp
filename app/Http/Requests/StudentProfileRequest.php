<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StudentProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @param Request $request
     * @return array
     */
    public function rules(Request $request)
    {
        $sexes = ['Masculin', 'Féminin'];
        switch($this->method()) {
            case 'GET':
            case 'DELETE':
                {
                    return [];
                }
            case 'POST':
                {
                    return [];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [

                        // Compte
                        'name' => 'required|min:6|max:255',
                        'email' => [
                            'required',
                            'email',
                            Rule::unique('users')->ignore($request->input('user_id'))
                        ],
                        'password' => 'nullable|min:8|confirmed',
                        'password_confirmation' => 'required_with_all:password|same:password',
                        'phone' => [
                            'required',
                            'min:9',
                            Rule::unique('users')->ignore($request->input('user_id'))
                        ],
                        'cin' => [
                            'required',
                            Rule::unique('users')->ignore($request->input('user_id'))
                        ],
                        'matriculation' => [
                            'required',
                            Rule::unique('users')->ignore($request->input('user_id'))
                        ],

                        // Profil Étudiant
                        'user_id' => [
                            'required',
                            'exists:users,id',
                            Rule::unique('students')->where(function ($query) use($request) {
                                return $query->where('user_id', $request->input('user_id'));
                            })->ignore($request->input('id')),
                        ],
                        'date_of_birth' => 'required|date',
                        'place_of_birth' => 'required',
                        'sex' => [
                            'required',
                            Rule::in($sexes)
                        ],
                        'is_foreign' => [
                            'required',
                            Rule::in(['oui', 'non'])
                        ],
                        'native_country' => 'nullable',
                    ];
                }
            default:
                break;
        }
        return [];
    }
}
