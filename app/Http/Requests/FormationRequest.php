<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class FormationRequest extends FormRequest
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
        switch($this->method()) {
            case 'GET':
            case 'DELETE':
                {
                    return [];
                }
            case 'POST':
                {
                    return [
                        'name' => [
                            'required',
                            Rule::unique('formations')->where(function ($query) use($request) {
                                return $query->where('department_id', $request->input('department_id'));
                            }),
                        ],
                        'department_id' => 'required|exists:departments,id'
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'name' => [
                            'required',
                            Rule::unique('formations')->where(function ($query) use($request) {
                                return $query->where('department_id', $request->input('department_id'));
                            }),
                        ],
                        'department_id' => 'required|exists:departments,id'
                    ];
                }
            default:
                break;
        }
        return [];
    }
}
