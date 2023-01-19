<?php

namespace App\Http\Requests\Menu;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'name' => 'required|min:5',
            'des' => 'required',
            'content' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'required' => 'Vui lòng nhập :attribute',
            'min' => ":attribute ít nhất :min ký tự"

        ];
    }
    public  function  attributes()
    {
        return [
            'name' => 'Tên danh mục',
            'des'=> 'Mô tả ngắn',
            'content' => 'Mô tả chi tiết',
        ];

    }
}
