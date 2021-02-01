<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreatePresentationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        // $user = Auth::user()->rol_id;

        // if($user === 1) {
        //     return true;
        // } else {
        //     return false;
        // }

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
            'name' => 'required|min:3|max:50|unique:presentations,name',
            // 'slug' => 'required'
        ];    
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es requerido.',
            'name.unique' => 'Este nombre ya se encuentra en uso',
            'slug.required' => 'Esto es requerido.',
        ];
    }
}
