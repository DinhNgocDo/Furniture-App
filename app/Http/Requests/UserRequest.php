<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $id = null;

        if ($this->method() === 'PUT') {
            $id = $this->route('user');
        }

        return [
            "role_id" => "required",
            "name" => "required",
            "email" => "required|email|unique:users,email," . $id,
            "phone" => "required|regex:/(0)[0-9]{9}/|digits:10|unique:users,phone," . $id,
        ];
    }

    public function messages()
    {
        return [
            "role_id.required" => "Chưa chọn quyền",
            "name.required" => "Chưa nhập họ và tên",
            "email.required" => "Chưa nhập email",
            "email.email" => "Email không đúng định dạng",
            "email.unique" => "Email đã được sử dụng",
            "phone.required" => "Chưa nhập số điện thoại",
            "phone.regex" => "Số điện thoại không đúng định dạng",
            "phone.digits" => "Số điện thoại phải có 10 số",
            "phone.unique" => "Số điện thoại đã được sử dụng",
        ];
    }
}
