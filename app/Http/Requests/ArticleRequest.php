<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'titre'=>'required|min:3',
            'date'=>'required|min:3',
            'lien'=>'required|min:3',
            'description'=>'required|min:3',
            'categorie'=>'required|min:3'
        ];
    }

    public function messages()
    {
        return [
            'titre.requied'=>'le titre est requis',
            'titre.min'=>'le titre doit contenir au moins 3 caractères',
            'date.requied'=>'la date est requise',
            'date.min'=>'la date doit contenir au moins 3 caractères',
            'link.requied'=>'le lien est requis',
            'link.min'=>'le lien doit contenir au moins 3 caractères',
            'description.requied'=>'la description est requise',
            'description.min'=>'la description doit contenir au moins 3 caractères',
            'categorie.requied'=>'la categorie est requise',
            'categorie.min'=>'la categorie doit contenir au moins 3 caractères',
        ];
    }
}
