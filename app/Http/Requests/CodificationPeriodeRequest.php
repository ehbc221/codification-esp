<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class CodificationPeriodeRequest extends FormRequest
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
                        'name' => 'nullable|unique:codification_periodes,name',
                        'school_year_start' => 'required|numeric|unique:codification_periodes,school_year_start',
                        'school_year_end' => 'required|numeric|unique:codification_periodes,school_year_end'
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'name' => 'nullable|unique:codification_periodes,name',
                        'school_year_start' => [
                            'required',
                            'numeric',
                            Rule::unique('codification_periodes')->where(function ($query) use($request) {
                                return $query->where('school_year_start', $request->input('school_year_start'));
                            })->ignore($request->input('id'))
                        ],
                        'school_year_end' => [
                            'required',
                            'numeric',
                            Rule::unique('codification_periodes')->where(function ($query) use($request) {
                                return $query->where('school_year_end', $request->input('school_year_end'));
                            })->ignore($request->input('id'))
                        ]
                    ];
                }
            default:
                break;
        }
        return [];
    }
}
