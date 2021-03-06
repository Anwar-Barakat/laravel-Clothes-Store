<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCouponRequest extends FormRequest
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
            'categories'        => 'required',
            'users'             => 'required',
            'type'              => 'required|in:Multiple Times,Single Times',
            'amount_type'       => 'required|in:Percentage,Fixed',
            'amount'            => 'required|numeric',
            'expiration_date'   => 'required|date',
        ];
    }
}