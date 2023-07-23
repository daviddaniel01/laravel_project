<?php

namespace App\Http\Requests\Teacher;

use App\Enums\TeacherStatusEnum;
use App\Models\Teacher;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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
                Rule::unique(Teacher::class)->ignore($this->teacher),
            ],
            'email' => [
                'bail',
                'required',
                'email',
                'unique',
                Rule::unique(Teacher::class)->ignore($this->teacher),
            ],
            'password' => [
                'bail',
                'required',
                Rule::unique(Teacher::class)->ignore($this->teacher),
            ],
            'gender' => [
                'bail',
                'required',
                'boolean',
                Rule::unique(Teacher::class)->ignore($this->teacher),
            ],
            'birthdate' => [
                'bail',
                'required',
                'date',
                'before:today',
                Rule::unique(Teacher::class)->ignore($this->teacher),
            ],
            'status' => [
                'bail',
                'required',
                Rule::in(TeacherStatusEnum::asArray()),
                Rule::unique(Teacher::class)->ignore($this->teacher),
            ],
            'avatar' => [
                'bail',
                'nullable',
                'file',
                'image',
                Rule::unique(Teacher::class)->ignore($this->teacher),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute bắt buộc phải điền',
            'string' => ':attribute bắt buộc là chữ',
            'unique' => ':attribute đã tồn tại',
            'image' => ':attribute phải là ảnh',
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
