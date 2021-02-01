<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProviderRequest extends FormRequest
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
            'name'              => 'required',
            'phone'             => 'string|min:6|max:9',
            'email'             => 'email',

            'category_id'       => 'required',
            'distributor_id'    => 'required',
            'district_id'       => 'required',
        ];
    }
}
