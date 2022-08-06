<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckOutRequest extends FormRequest
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
            "name" => "required",
            "email" => "required|email",
            "phone" => "required|regex:/(0)[0-9]{9}/|digits:10",
            "address" => "required",
            "note" => "max: 255",
        ];
    }

    public function messages()
    {
        return [
            "role_id.required" => "Chưa chọn quyền",
            "name.required" => "Chưa nhập họ và tên",
            "email.required" => "Chưa nhập email",
            "email.email" => "Email không đúng định dạng",
            "phone.required" => "Chưa nhập số điện thoại",
            "phone.regex" => "Số điện thoại không đúng định dạng",
            "phone.digits" => "Số điện thoại phải có 10 số",
            "address.required" => "Chưa nhập địa chỉ",
            "note.max" => "Ghi chú tối đa 255 ký tự",
        ];
    }
}
