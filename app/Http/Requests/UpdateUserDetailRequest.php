<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserDetailRequest extends FormRequest
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
            'name'          => 'required|regex:/^[\pL\s\-]+$/u',
            'mobile'        => 'required|numeric|min:9',
            'country_id'    => 'required',
            'city'          => 'required',
            'state'         => 'required',
            'address'       => 'required',
            'pincode'       => 'required',
        ];
    }
}
