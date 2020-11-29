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
        return [
            'first_name' => 'required|string|max:100|min:3',
            'last_name' => 'required|string|max:100|min:3',
            'phone' => 'sometimes|required|max:80|unique:admins,phone,'.$this->id,
            'email' => 'required|email|unique:admins,email,'.$this->id,
            'password' => 'required_without:id',
            'repassword' => 'required_without:id',
            'address' => 'required|min:5',
            'city' => 'required',
            'gender' => 'required',
            /*'address' => 'required',
            'manage_id' => 'required|exists:admins,id|'
            */
        ];
    }

    public function messages()
    {
        return [
            'first_name.min' => 'first_name most be > 3 caracter !',
            'last_name.min' => 'first_name most be > 3 caracter !',
            'first_name.required' => 'The first name field is required.',
            'last_name.required' => 'The last name field is required.',
            'password.required' => 'The password field is required.',
            'repassword.required' => 'The repeate password field is required.',
            'phone.required' => 'The phone field is required.',
            'address.required' => 'The address field is required.',
            'city.required' => 'The city field is required.',
            'gender.required' => 'The gender field is required.',
        ];
    }
}
