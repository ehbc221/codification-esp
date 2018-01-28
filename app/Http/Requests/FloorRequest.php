<?php

namespace App\Http\Requests;

use App\Floor;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class FloorRequest extends FormRequest
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
        $floor = Floor::find($this->floor);

        switch($this->method()) {
            case 'GET':
            case 'DELETE':
                {
                    return [];
                }
            case 'POST':
                {
                    return [
                        'number' => 'required',
                        'block_id' => 'required|exists:blocks,id'
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'number' => 'required',
                        'block_id' => 'required|exists:blocks,id'
                    ];
                }
            default:
                break;
        }
        return [];
    }
}
