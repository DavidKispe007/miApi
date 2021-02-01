<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'brand'             => 'required',
            'stock'             => 'required',
            'price_purchase'    => 'required',
            'price_sale'        => 'required',
            'category_id'       => 'required',
            'provider_id'       => 'required',
            'presentation_id'   => 'required',
            'ubication_id'      => 'required'
        ];
    }
}
