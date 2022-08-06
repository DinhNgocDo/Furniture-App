<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            "email" => "required|email|unique:users,email",
            "password" => "required",
            "name" => "required",
            "phone" => "required|regex:/(0)[0-9]{9}/|digits:10|unique:users,phone",
            "address" => "required",
        ];
    }

    public function messages()
    {
        return [
            "email.required" => "Chưa nhập email",
            "email.email" => "Email không đúng định dạng",
            "email.unique" => "Email đã được sử dụng",
            "password.required" => "Chưa nhập mật khẩu",
            "name.required" => "Chưa nhập họ tên",
            "phone.required" => "Chưa nhập số điện thoại",
            "phone.regex" => "Số điện thoại không đúng định dạng",
            "phone.digits" => "Số điện thoại phải có 10 số",
            "phone.unique" => "Số điện thoại đã được sử dụng",
            "address.required" => "Chưa nhập địa chỉ",
        ];
    }
}
