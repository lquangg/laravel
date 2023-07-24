<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Chuyển thành true
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [];

        // Lấy phương thức đang hoạt động
        $currentAction = $this->route()->getActionMethod();

        switch ($this->method()) {
            case 'POST':
                switch ($currentAction) {
                    case 'add_category': // cái name của route
                        $rules = [
                            'name' => 'required',
                            'image' => 'required|max:255'


                        ];
                        break;

                    default:
                        break;
                }
                break;
        }

        return $rules;
    }

    // Tùy chỉnh thông báo hiển thị
    public function messages()
    {
        return [
            'name.required' => 'Bắt buộc phải điền tên',
            'image.max' => ' nhập quá dài',

        ];
    }
}
