<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
     * @return array
     */
    public function rules()
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
                        'school_year_start' => 'required|unique:codification_periodes,school_year_start',
                        'school_year_end' => 'required|unique:codification_periodes,school_year_end'
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'name' => 'nullable|unique:codification_periodes,name',
                        'school_year_start' => 'required|unique:codification_periodes,school_year_start',
                        'school_year_end' => 'required|unique:codification_periodes,school_year_end'
                    ];
                }
            default:
                break;
        }
        return [];
    }
}
