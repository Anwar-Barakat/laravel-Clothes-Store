<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCurrencyRequest extends FormRequest
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
            'code'      => ['required', 'regex:/^[\pL\s\-]+$/u', Rule::unique('currencies')->ignore($this->currency->id)],
            'rate'      => ['required', 'bail', 'gt:0'],
            'status'    => ['required', 'in:0,1']
        ];
    }
}