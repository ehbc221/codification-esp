<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ReservationRequest extends FormRequest
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
        //dd($request);
        switch($this->method()) {
            case 'GET':
            case 'DELETE':
                {
                    return [];
                }
            case 'POST':
                {
                    return [
                        'codification_periode_id' => 'required|exists:codification_periodes,id',
                        'student_id' => [
                            'required',
                            'exists:students,id',
                            Rule::unique('reservations')->where(function ($query) use($request) {
                                return $query->where('codification_periode_id', $request->input('codification_periode_id'));
                            })
                        ],
                        'position_id' => [
                            'required',
                            'exists:positions,id',
                            Rule::unique('reservations')->where(function ($query) use($request) {
                                return $query->where('codification_periode_id', $request->input('codification_periode_id'));
                            })
                        ]
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'codification_periode_id' => 'required|exists:codification_periodes,id',
                        'student_id' => [
                            'required',
                            'exists:students,id',
                            Rule::unique('reservations')->where(function ($query) use($request) {
                                return $query->where('codification_periode_id', $request->input('codification_periode_id'));
                            })->ignore($request->input('id'))
                        ],
                        'position_id' => [
                            'required',
                            'exists:positions,id',
                            Rule::unique('reservations')->where(function ($query) use($request) {
                                return $query->where('codification_periode_id', $request->input('codification_periode_id'));
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
