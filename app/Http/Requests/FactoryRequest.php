<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FactoryRequest extends FormRequest
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
            'name' => 'required|string|max:100|min:3|unique:factories,name,'.$this->id,
            'desc' => 'required|string|max:400|min:50',
            'phone' => 'sometimes|required|max:10|min:10|unique:factories,phone,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'desc.required' => 'The desc field is required.',
            'phone.required' => 'The phone field is required.',
        ];
    }
}
