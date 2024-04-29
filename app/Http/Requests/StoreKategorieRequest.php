<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKategorieRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nazev' => 'required',
            'popis' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nazev.required' => 'název nesmí být prázdný.',
            'popis.required' => 'kategorie musí být popsána',
        ];
    }
}
