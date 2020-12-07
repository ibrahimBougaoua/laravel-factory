<?php

namespace App\Http\Requests\Ui;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'phone' => 'sometimes|required|max:80|unique:customers,phone,'.$this->id,
            'email' => 'required|email|unique:customers,email,'.$this->id,
            'password' => 'required_without:id',
            'address' => 'required|min:5',
            'city' => 'required',
            'gender' => 'required',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
