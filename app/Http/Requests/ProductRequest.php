<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        if ($this->method() === 'PUT') {
            $image = "nullable";
        } else {
            $image = "required";
        }

        return [
            "image" => $image . "|image|mimes:jpeg,png,jpg|max:1000",
            "name" => "required",
            "description" => "required",
            "price" => "required|numeric|min:0",
            "sale_percent" => "nullable|numeric|min:0|max:100",
            "status" => "required",
        ];
    }

    public function messages()
    {
        return [
            "image.required" => "Chưa chọn hình ảnh",
            "image.image" => "Hình ảnh không đúng định dạng",
            "image.mimes" => "Hình ảnh phải là dạng (jpeg, png, jpg)",
            "image.max" => "Hình ảnh tối đa 1MB",
            "name.required" => "Chưa nhập tên sản phẩm",
            "description.required" => "Chưa nhập mô tả sản phẩm",
            "price.required" => "Chưa nhập giá gốc của sản phẩm",
            "price.numeric" => "Giá gốc phải là số",
            "sale_percent.numeric" => "Phần trăm sale phải là số",
            "sale_percent.min" => "Sale tối thiểu 0%",
            "sale_percent.max" => "Sale tối đa 100%",
            "status.required" => "Chưa chọn trạng thái",
        ];
    }
}
