<?php

namespace App\Http\Requests\Book;

use App\Models\Book;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
//            'title' => 'string|min:' , Book::MIN_TITLE_LENGTH . '|max:' . Book::MAX_TITLE_LENGTH,
//            'short_description' => 'string|min:' . Book::MIN_DESCRIPTION_LENGTH . '|max:' . Book::MIN_DESCRIPTION_LENGTH,
//            'amount' => 'numeric|min:' . Book::MIN_AMOUNT . '|max:' . Book::MAX_AMOUNT,
//            'author_id' => 'integer|exists:authors,id',
//            'title' => 'required|string|min:1|max:64',
//            'short_description' => 'required|string|min:1|max:200',
//            'amount' => 'required|numeric|min:0|max:1000',
//            'author_id' => 'integer|exists:authors,id',
        ];
    }
}
