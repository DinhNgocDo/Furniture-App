<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCartRequest extends FormRequest
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
            'quantity' => 'required|gt:0'
        ];
    }

    public function messages()
    {
        return [
            'quantity.required' => 'Chưa chọn số lượng',
            'quantity.gt' => 'Số lượng tối thiểu là 1'
        ];
    }
}
