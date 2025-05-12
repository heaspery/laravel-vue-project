<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChapterStoreRequest extends FormRequest
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
     *a
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:1000'],
            'story_id' => ['required', 'exists:stories,id'],
            'image' => ['required', 'nullable', 'max:100'],
        ];
    }
}
