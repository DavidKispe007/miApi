<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProyeerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'dni' => 'unique:employeers|string|min:8|max:8',
            'phone'  => 'unique:employeers|string|min:7|max:9',

            'user_id'   => 'required',
            'district_id'   => 'required',
        ];
    }
}
