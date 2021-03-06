<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrandRequest extends FormRequest
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
            'name_ar'       => 'required|regex:/^[\pL\s\-]+$/u|unique:brands,name->ar,' . $this->brand->id,
            'name_en'       => 'required|regex:/^[\pL\s\-]+$/u|unique:brands,name->en,' . $this->brand->id,
            'status'        => 'required|in:0,1',
        ];
    }
}