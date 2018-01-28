<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class LaneRequest extends FormRequest
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
                            Rule::unique('lanes')->where(function ($query) use($request) {
                                return $query->where('floor_id', $request->input('floor_id'));
                            }),
                        ],
                        'floor_id' => 'required|exists:floors,id'
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'name' => [
                            'required',
                            Rule::unique('lanes')->where(function ($query) use($request) {
                                return $query->where('floor_id', $request->input('floor_id'));
                            }),
                        ],
                        'floor_id' => 'required|exists:floors,id'
                    ];
                }
            default:
                break;
        }
        return [];
    }
}
