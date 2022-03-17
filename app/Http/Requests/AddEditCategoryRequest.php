<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddEditCategoryRequest extends FormRequest
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
            'url'               => 'required|min:3',
            'section_id'        => 'required',
            'parent_id'         => 'required',
            'discount'          => 'required',
            'description'       => 'required|min:10',
            'meta_title'        => 'required|min:3',
            'meta_description'  => 'required|min:10',
            'meta_keywords'     => 'required'
        ];
    }
}
