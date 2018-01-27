<?php

namespace App\Http\Requests;

use App\Formation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class FormationRequest extends FormRequest
{
    /**
     * Determine if the formation is authorized to make this request.
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
        $formation = Formation::find($this->formation);

        switch($this->method()) {
            case 'GET':
            case 'DELETE':
                {
                    return [];
                }
            case 'POST':
                {
                    return [
                        'name' => 'required',
                        'department_id' => 'exists:departments,id'
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'name' => 'required',
                        'department_id' => 'exists:departments,id'
                    ];
                }
            default:
                break;
        }
        return [];
    }
}
