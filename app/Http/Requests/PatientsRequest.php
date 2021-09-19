<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PatientsRequest extends FormRequest
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
        $rules = [
            'name' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ];

        if ($this->method() === "POST") {
            $rules ['cpf'] = [
                'required',
                Rule::unique('patiens', 'cpf')
            ];
        } else {
            $rules ['cpf'] = ['required',
            Rule::unique('patients', 'cpf')->ignore($this->request->get('cpf'), 'cpf')
            ];
        }

        return $rules;
    }
}
