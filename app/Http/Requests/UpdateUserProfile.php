<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserProfile extends FormRequest
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
            'company' => 'required|max:100',
            'name' => 'required|max:100',
            'phone' => 'required|numeric',
            'password' => 'confirmed'
        ];
    }

    public function messages()
    {
        return [
            'company.required' => 'This field is required',
            'company.max' => 'Company name is to long',
            'name.required' => 'This field is required',
            'name.max' => 'Name is to long',
            'phone.required' => 'This field is required',
            'phone.numeric' => 'Phone number must be a number'
        ];
    }
}
