<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SizeRequest extends FormRequest
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
            $id = $this->route('size');
        }

        return [
            "name" => "required|unique:sizes,name," . $id,
            "status" => "required",
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Chưa nhập kích thước",
            "name.unique" => "Kích thước đã tồn tại",
            "status.required" => "Chưa chọn trạng thái",
        ];
    }
}
