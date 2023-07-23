<?php

namespace App\Http\Requests\Semester;

use App\Models\Course;
use App\Models\Semesters;
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
                Rule::unique(Semester::class)->ignore($this->semester)
            ],
            'course_id' => [
                'bail',
                'required',
                Rule::unique(Semesters::class)->ignore($this->semester),
                Rule::exists(Course::class, 'id'),
            ],
            'student_id' => [
                'bail',
                'required',
                Rule::unique(Semesters::class)->ignore($this->semester),
                Rule::exists(Student::class, 'id'),
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute bắt buộc phải điền',
            'string' => ':attribute bắt buộc là chữ',
            'unique' => ':attribute đã tồn tại',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Tên'
        ];
    }
}
