<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormProductRequest extends FormRequest
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
            'name' => 'required|min:2',
            'id_category' => 'required',
            'price_in' => 'required|min:0',
            'price_out' => 'required|min:0',
            'description' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,webp'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Vui lòng nhập :attribute',
            'min' => ":attribute ít nhất :min ký tự",
            'mimes' => "Yêu cầu file ảnh đại diện đuôi jpeg,png,jpg,gif",

        ];
    }
    public function attributes()
    {
        return [
            'name' => "Tên sản phẩm",
            'id_category' => "Tên loại hàng",
            'price_in' => "Giá nhập",
            'price_out' => 'Giá bán',
            'description' => "Mô tả sản phẩm",
            "image" => "Ảnh sản phẩm",

        ];
    }
}
