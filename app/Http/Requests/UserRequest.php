<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                "first_name"=>"required|string",
                "last_name"=> "required|string",
                "email"=>"required|string|unique:users|email",
                "ville_id"=>"numeric",
                "avatar"=>"string|string|max:50",
                "description"=>"string",
                "sous_categorie_id"=>"numeric",
                "password"=>"required|string|min:3",
                "cv"=> "string|max:50"
        ];
    }
}
