<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnonceRequest extends FormRequest
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
            "titre" => ['required', "string", "min:5", "max:255"],
            "description" => ['required', "string", "min:5"],
            "type_id" => ['required', "numeric"],
            "user_id" => ['required', "numeric"],
            "sous_categorie_id" => ['required', "numeric"],
            "active" => ['required', "boolean"],
        ];
    }
}
