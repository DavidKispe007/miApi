<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeerRequest extends FormRequest
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
            'dni' => 'required|min:8|max:8|unique:employeers,dni,' . $this->route('employeer')->id,
            'phone' => 'required|min:7|max:9|unique:employeers,phone,' . $this->route('employeer')->id,

            'user_id'   => 'required',
            'district_id'   => 'required',
        ];
    }
}
