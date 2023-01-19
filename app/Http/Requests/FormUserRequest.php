<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormUserRequest extends FormRequest
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
            'password' => 'required|confirmed|min:5',
            'email' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Vui lòng nhập :attribute',
            'min' => ":attribute ít nhất :min ký tự",
            'mimes' => "Yêu cầu file ảnh đại diện đuôi jpeg,png,jpg,gif",
            'confirmed'=> "Mật khẩu không khớp",
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Họ tên',
            'password' => 'Mật khẩu',
            'current_password' => 'Xác nhận mật khẩu',
            'email' => 'email'
        ];

    }
}
