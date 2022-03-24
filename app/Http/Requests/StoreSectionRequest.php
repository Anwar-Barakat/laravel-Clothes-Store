<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSectionRequest extends FormRequest
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
            'name_ar'       => 'required|unique:sections,name->ar|regex:/^[\pL\s\-]+$/u',
            'name_en'       => 'required|unique:sections,name->en|regex:/^[\pL\s\-]+$/u',
            'status'        => 'required|in:0,1',
        ];
    }
}