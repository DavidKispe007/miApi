<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
        // dd($this->route('customer')->id);
        return [
            'name' => 'required',

            'last_name' => 'required',
            'email' => 'required|min:3|max:50|unique:customers,email,' . $this->route('customer')->id,
            'phone' => 'required|min:7|max:9|unique:customers,phone,' . $this->route('customer')->id,

            'district_id'   => 'required',
        ];
    }
}
