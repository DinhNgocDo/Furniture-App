<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            "name" => "required|max:255",
            "short_description" => "required|max:255",
            "content" => "required",
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
            "name.required" => "Chưa nhập tên bài",
            "name.max" => "Tên bài tối đa 255 ký tự",
            "short_description.required" => "Chưa nhập mô tả ngắn",
            "short_description.max" => "Mô tả ngắn tối đa 255 ký tự",
            "content.required" => "Chưa nhập nội dung bài",
            "status.required" => "Chưa chọn trạng thái",
        ];
    }
}
