<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
        return [/*
            'first_name' => 'required|string|max:100',
            'first_name' => 'required|string|max:100',
            'email' => 'required|email|unique:admins,email,' . $this->id,
            'password' => 'required_without:id',
            'phone' => 'required|max:50|unique:admins,phone,' . $this->id,
            'city' => 'required',
            'address' => 'required',
            'manage_id' => 'required|exists:admins,id|'
            */
        ];
    }

    public function messages()
    {
        return [
            'required' => 'this field is required',
            'email.email' => 'email invalide',
            'max' => 'this field is to long',
        ];
    }
}
