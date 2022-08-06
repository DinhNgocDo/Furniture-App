<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeInformationRequest extends FormRequest
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
        $data = $this->input();
        $password = "nullable";
        
        if ($data["password"] != null) {
            $password = "required|min:5|max:50";
        }
    
        return [
            "name" => "required|min:5|max:255",
            "email" => "required|email",
            "phone" => "required|regex:/(0)[0-9]{9}/|digits:10",
            "address" => "required|min:5|max:255",
            "password" => $password
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Chưa nhập họ tên",
            "name.min" => "Độ dài tối thiểu là 5",
            "name.max" => "Độ dài tối đa là 255",
            "email.required" => "Chưa nhập email",
            "email.email" => "Email không đúng định dạng",
            "phone.required" => "Chưa nhập số điện thoại",
            "phone.regex" => "Số điện thoại không đúng định dạng",
            "phone.digits" => "Số điện thoại phải có 10 số",
            "address.required" => "Chưa nhập địa chỉ",
            "address.min" => "Độ dài tối thiểu là 5",
            "address.max" => "Độ dài tối đa là 255",
            "password.required" => "Chưa nhập mật khẩu",
            "password.min" => "Độ dài tối thiểu là 5",
            "password.max" => "Độ dài tối đa là 50",
        ];
    }
}
