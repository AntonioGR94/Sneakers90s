<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'name'         => 'required|min:4',
            'description'         => 'required|min:4',
            'owner'         => 'required|min:3',
            'url'          => 'required',
            'createDate'   => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'     =>  'El :attribute es requerido',
            'description.required'     =>  'El :attribute es requerido',
            'owner.required'     =>  'El :attribute es requerido',
            'url.required'  =>  'El :attribute es requerido',
            'createDate.required'       =>  'El :attribute es requerido'
        ];
    }
}
