<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class lotRequest extends FormRequest
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
            'numLot'=>'required|string',
            'dateF'=>'required|date',
            'dateP'=>'required|date|after:dateF',
            'prixA'=> 'required|numeric|min:0',
            'prixV'=> 'required|numeric|min:0|gt:prixA',
            'Qte'=>'required|integer|min:0'
        ];
    }
}
