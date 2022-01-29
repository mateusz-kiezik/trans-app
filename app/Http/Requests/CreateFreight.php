<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFreight extends FormRequest
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
            'loadingDate' => 'required|date|after_or_equal:today',
            'loadingTime' => 'required',
            'loadingAddress.country' => 'required',
            'loadingAddress.city' => 'required',
            'unloadingDate' => 'required|date|after_or_equal:loadingDate',
            'unloadingTime' => 'required',
            'unloadingAddress.country' => 'required',
            'unloadingAddress.city' => 'required',
            'truckSize' => 'required',
            'truckType' => 'required',
            'cargoType' => 'required',
            'quantity' => 'required|numeric|min:1|max:100',
            'weight' => 'required|numeric|min:1|max:50000',
            'freightType' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'loadingDate.required' => 'This field is required',
            'loadingTime.required' => 'This field is required',
            'loadingAddress.country.required' => 'This field is required',
            'loadingAddress.city.required' => 'This field is required',
            'unloadingDate.required' => 'This field is required',
            'unloadingTime.required' => 'This field is required',
            'unloadingAddress.country.required' => 'This field is required',
            'unloadingAddress.city.required' => 'This field is required',
            'truckSize.required' => 'Truck size is required',
            'truckType.required' => 'Truck type is required',
            'cargoType.required' => 'Cargo type is required',
            'quantity.required' => 'This field is required',
            'quantity.numeric' => 'Quantity must be a number',
            'quantity.min' => 'Min quantity is 1',
            'quantity.max' => 'Max quantity is 100',
            'weight.required' => 'This field is required',
            'weight.numeric' => 'Weight must be a number',
            'weight.min' => 'Min weight is 1',
            'weight.max' => 'Max weight is 50000',
            'freightType.required' => 'Freight type is required'
        ];
    }
}
