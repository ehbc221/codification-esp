<?php

namespace App\Http\Requests;

use App\Grade;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class GradeRequest extends FormRequest
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
        $grade = Grade::find($this->grade);

        switch($this->method()) {
            case 'GET':
            case 'DELETE':
                {
                    return [];
                }
            case 'POST':
                {
                    return [
                        'number' => 'required|integer|unique:grades,id,NULL,id,formation_id,'.$grade->id,
                        'formation_id' => 'required|exists:formations,id'
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'number' => 'required|integer|unique:grades,id,NULL,id,formation_id,'.$grade->id,
                        'formation_id' => 'required|exists:formations,id'
                    ];
                }
            default:
                break;
        }
        return [];
    }
}
