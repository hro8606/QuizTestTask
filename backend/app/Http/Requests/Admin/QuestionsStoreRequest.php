<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class QuestionsStoreRequest extends FormRequest
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
            'question' => ['required','string','max:255'],
            'questionType' => ['required','boolean'],
            'binary_correct_answer' => ['required_if:questionType,0','boolean'],
            'answers' => ['required_if:questionType,1','array'],
            'answers.*' => ['required_if:questionType,1'],
            'correct_answer' => ['required_if:questionType,1',Rule::in('1','2','3')]
        ];
    }
}
