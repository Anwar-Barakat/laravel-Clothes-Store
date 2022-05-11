<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReturnExchangeOrderRequest extends FormRequest
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
            'product_info'  => 'required',
            'reason'        => 'required|in:performance or quality adequate,product damaged but shipping box ok,item arrived too late,wrong item was send,item defective or does not work,required smaller size,required larger size',
            'comment'       => 'required|min:10',
        ];
    }
}