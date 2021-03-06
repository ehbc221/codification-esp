<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RoomRequest extends FormRequest
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
                            Rule::unique('rooms')->where(function ($query) use($request) {
                                return $query->where('lane_id', $request->input('lane_id'));
                            }),
                        ],
                        'lane_id' => 'required|exists:lanes,id'
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'number' => [
                            'required',
                            Rule::unique('rooms')->where(function ($query) use($request) {
                                return $query->where('lane_id', $request->input('lane_id'));
                            }),
                        ],
                        'lane_id' => 'required|exists:lanes,id'
                    ];
                }
            default:
                break;
        }
        return [];
    }
}
