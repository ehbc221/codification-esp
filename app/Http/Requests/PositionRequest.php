<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PositionRequest extends FormRequest
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
                        'number' => [
                            'required',
                            Rule::unique('positions')->where(function ($query) use($request) {
                                return $query->where('room_id', $request->input('room_id'));
                            }),
                        ],
                        'room_id' => 'required|exists:rooms,id'
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'number' => [
                            'required',
                            Rule::unique('positions')->where(function ($query) use($request) {
                                return $query->where('room_id', $request->input('room_id'));
                            }),
                        ],
                        'room_id' => 'required|exists:rooms,id'
                    ];
                }
            default:
                break;
        }
        return [];
    }
}
