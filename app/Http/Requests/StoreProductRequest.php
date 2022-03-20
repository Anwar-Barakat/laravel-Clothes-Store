<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'category_id'           => 'required',
            'name'                  => 'required|regex:/^[\pL\s\-]+$/u',
            'code'                  => 'required|regex:/^[\w-]*$/',
            'color'                 => 'required|regex:/^[\pL\s\-]+$/u',
            'price'                 => 'required|numeric',
            'discount'              => 'required|numeric',
            'weight'                => 'required|numeric',
            'video'                 => 'nullable',
            'description'           => '',
            'wash_care'             => '',
            'fabric'                => '',
            'pattern'               => '',
            'sleeve'                => '',
            'fit'                   => '',
            'occasion'              => '',
            'meta_title'            => '',
            'meta_description'      => '',
            'meta_keywords'         => '',
            'is_feature'            => 'required|in:0,1',
            'status'                => 'required|in:0,1',
        ];
    }
}