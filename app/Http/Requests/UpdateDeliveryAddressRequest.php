<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDeliveryAddressRequest extends FormRequest
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
            'user_id'       => 'required',
            'name'          => 'required|min:3|regex:/^[\pL\s\-]+$/u',
            'mobile'        => ['required', 'digits:10', 'numeric', Rule::unique('delivery_addresses')->ignore($this->deliveryAddress->id)],
            'address'       => 'required|min:3',
            'city'          => 'required|min:3|regex:/^[\pL\s\-]+$/u',
            'state'         => 'required|min:3|regex:/^[\pL\s\-]+$/u',
            'country_id'    => 'required',
            'pincode'       => 'required|digits:6',
        ];
    }
}