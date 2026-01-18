<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsletterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'email'=>'required|min:3'
        ];
    }

    public function messages()
    {
        return [
            'email.requied'=>'l\'email est requis',
            'email.min'=>'l\'email doit contenir au moins 3 caractères'
        ];
    }
}
