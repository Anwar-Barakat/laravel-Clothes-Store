<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductAttributeRequest extends FormRequest
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
            'size.*'      => 'required',
            'sku.*'       => 'required|unique:product_attributes,sku',
            'price.*'     => 'required|numeric|array',
            'strock.*'    => 'required|numeric|array',
        ];
    }
}