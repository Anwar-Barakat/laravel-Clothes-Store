<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCurrencyRequest extends FormRequest
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
            'code'      => ['required', 'regex:/^[\pL\s\-]+$/u', 'min:3'],
            'rate'      => ['required', 'numeric'],
            'status'    => ['required', 'in:0,1']
        ];
    }
}