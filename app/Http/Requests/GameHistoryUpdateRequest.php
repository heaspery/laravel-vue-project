<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameHistoryUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'sometimes|exists:users,id',
            'story_id' => 'sometimes|exists:stories,id',
            'chapter_id' => 'sometimes|exists:chapters,id',
            'name_choice' => 'sometimes|string',
        ];
    }
}
