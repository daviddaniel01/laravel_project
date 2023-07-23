<?php

namespace App\Http\Requests\Teacher;

use App\Enums\TeacherStatusEnum;
use App\Models\Course;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [

            'name' => [
                'bail',
                'required',
                'string',
            ],
            'email' => [
                'bail',
                'required',
                'email',
            ],
            'password' => [
                'bail',
                'required',
            ],
            'gender' => [
                'bail',
                'required',
                'boolean',
            ],
            'birthdate' => [
                'bail',
                'required',
                'date',
                'before:today'
            ],
            'status' => [
                'bail',
                'required',
                Rule::in(TeacherStatusEnum::asArray()),
            ],
            'avatar' => [
                'bail',
                'nullable',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute bắt buộc phải điền',
            'string' => ':attribute bắt buộc là chữ',
            'unique' => ':attribute đã tồn tại',
            'before:today' => ':attribute không hợp lệ',
            'email' => 'Bắt buộc phải là email',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Tên',
            'gender' => ' Giới tính',
            'birthdate' => 'Ngày sinh',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'status' => 'Trạng thái',
            'avatar' => 'Ảnh',
        ];
    }
}
