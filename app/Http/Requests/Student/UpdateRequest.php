<?php

namespace App\Http\Requests\Student;

use App\Enums\StudentStatusEnum;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
                Rule::unique(Student::class)->ignore($this->student),
            ],
            'email' => [
                'bail',
                'required',
                'email',
                'unique',
                Rule::unique(Student::class)->ignore($this->student),
            ],
            'password' => [
                'bail',
                'required',
                Rule::unique(Student::class)->ignore($this->student),
            ],
            'gender' => [
                'bail',
                'required',
                'boolean',
                Rule::unique(Student::class)->ignore($this->student),
            ],
            'birthdate' => [
                'bail',
                'required',
                'date',
                'before:today',
                Rule::unique(Student::class)->ignore($this->student),
            ],
            'status' => [
                'bail',
                'required',
                Rule::in(StudentStatusEnum::asArray()),
                Rule::unique(Student::class)->ignore($this->student),
            ],
            'avatar' => [
                'bail',
                'nullable',
                'file',
                'image',
                Rule::unique(Student::class)->ignore($this->student),
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
