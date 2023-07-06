<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'description' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name could not keep empty',
            // 'description.required' => 'Description cannot be empty'
        ];
    }

    public function attributes(): array
    {
        return [
            'description' => 'Category Description',
        ];
    }
}
