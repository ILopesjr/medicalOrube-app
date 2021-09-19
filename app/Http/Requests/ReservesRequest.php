<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservesRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'id_doctor' => 'required',
            'id_room' => 'required',
            'lease_date' => 'required|date|after_or_equal:today'
        ];
    }
}
