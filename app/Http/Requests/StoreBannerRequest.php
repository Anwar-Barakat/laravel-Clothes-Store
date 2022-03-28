<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBannerRequest extends FormRequest
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
            'title_ar'          => 'required|unique:banners,title->ar|regex:/^[\pL\s\-]+$/u',
            'title_en'          => 'required|unique:banners,title->en|regex:/^[\pL\s\-]+$/u',
            'link'              => 'required|min:3',
            'alternative'       => 'required|min:3',
            'status'            => 'required|in:0,1',
            'image'             => 'required|mimes:jpeg,jpg,png,jfif|max:1000',
        ];
    }
}