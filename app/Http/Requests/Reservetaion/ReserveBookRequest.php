<?php

namespace App\Http\Requests\Reservetaion;

use App\Models\Reservation;
use App\Rules\ReserveBookRule;
use Illuminate\Foundation\Http\FormRequest;

class ReserveBookRequest extends FormRequest
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
            'book_id' => 'required|exists:books,id',
            'quantity' => [
                'required',
                'numeric',
                'min:1',
                new ReserveBookRule()
                ],
            'email' => 'required|max:255|regex:/(.*)@gmail\.com/i', // something@gmail.com
        ];
    }
}
