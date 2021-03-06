<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DoctorsRequest extends FormRequest
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
            'specialization' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ];

        if ($this->method() === "POST") {
            $rules ['crm'] = [
                'required',
                Rule::unique('doctors', 'crm')
            ];
        } else {
            $rules ['crm'] = ['required',
                Rule::unique('doctors', 'crm')->ignore($this->request->get('crm'), 'crm')
            ];
        }

        return $rules;
    }
}
