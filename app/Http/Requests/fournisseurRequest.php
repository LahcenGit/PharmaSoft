<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class fournisseurRequest extends FormRequest
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
            'nom' => ['required', 'string', 'max:255'], 
            'adresse' => ['required', 'string', 'max:255'], 
            'telephone' => ['required', 'string', 'max:255'], 
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'], 
        ];
    }
}
