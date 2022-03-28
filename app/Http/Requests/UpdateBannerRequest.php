<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerRequest extends FormRequest
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
            'title_ar'          => 'required|regex:/^[\pL\s\-]+$/u|unique:banners,title->ar,' . $this->banner->id,
            'title_en'          => 'required|regex:/^[\pL\s\-]+$/u|unique:banners,title->en,' . $this->banner->id,
            'link'              => 'required|min:3',
            'alternative'       => 'required|min:3',
            'status'            => 'required|in:0,1',
            'image'             => 'nullable|mimes:jpeg,jpg,png|max:1024',
        ];
    }
}