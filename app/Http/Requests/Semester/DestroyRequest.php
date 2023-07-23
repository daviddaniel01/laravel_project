<?php

namespace App\Http\Requests\Semester;

use App\Models\Semesters;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DestroyRequest extends FormRequest
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
    public function rules()
    {
        return [
            'semester' => [
                'required',
                Rule::exists(Semesters::class, 'id')
            ],
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge(['semester' => $this->route('semester')]);
    }
}
