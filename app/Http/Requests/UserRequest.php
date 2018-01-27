<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $user = User::find($this->user);

        switch($this->method()) {
            case 'GET':
            case 'DELETE':
                {
                    return [];
                }
            case 'POST':
                {
                    return [
                        'name' => 'required|min:6|max:255',
                        'email' => 'required|email|unique:users',
                        'password' => 'required|min:8',
                        'phone' => 'required|min:9',
                        'cin' => 'required|unique:users',
                        'matriculation' => 'required|unique:users'
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'name' => 'required|min:6|max:255',
                        'email' => [
                            'required',
                            'email',
                            Rule::unique('users')->ignore($user->id)
                        ],
                        'password' => 'nullable|min:8|confirmed',
                        'password_confirmation' => 'required_with_all:password|same:password',
                        'phone' => [
                            'required',
                            'min:9',
                            Rule::unique('users')->ignore($user->id)
                        ],
                        'cin' => [
                            'required',
                            Rule::unique('users')->ignore($user->id)
                        ],
                        'matriculation' => [
                            'required',
                            Rule::unique('users')->ignore($user->id)
                        ],
                    ];
                }
            default:
                break;
        }
        return [];
    }
}
