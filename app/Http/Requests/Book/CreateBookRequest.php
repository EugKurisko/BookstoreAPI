<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:1|max:64',
            'short_description' => 'required|string|min:1|max:200',
            'amount' => 'required|numeric|min:0|max:1000',
            'author_id' => 'integer|exists:authors,id',
        ];
    }
}
