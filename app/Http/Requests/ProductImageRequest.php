<?php

namespace TaruCommerce\Http\Requests;

use TaruCommerce\Http\Requests\Request;

class ProductImageRequest extends Request
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
            'image' => 'image|max:1000|mimes:jpg,png,jpeg,gif'
        ];
    }
}
