<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'name'              => 'required|min:3',
            'section_id'        => 'required',
            'parent_id'         => 'required',
            'discount'          => 'required',
            'meta_title'        => 'required',
            'meta_description'  => 'required',
            'meta_keywords'     => 'required',
            'description'       => 'required|min:10',
            'status'            => 'required|in:0,1',
            'image'             => 'nullable|image|mimes:jpeg,png,jpg|max:1048',
        ];
    }
}