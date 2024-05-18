<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUzivatel extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'krestni_jmeno' => 'required|string|max:255',
            'prijmeni' => 'required|string|max:255',
            'prezdivka' => 'required|string|max:255',
            'heslo' => 'required|string|min:8',
        ];
    }

    public function messages()
    {
        return [
            'krestni_jmeno.required' => 'Křestní jméno nesmí být prázdné.',
            'prijmeni.required' => 'Příjmení nesmí být prázdné.',
            'prezdivka.required' => 'Přezdívka nesmí být prázdná.',
            'heslo.required' => 'Heslo nesmí být prázdné.',
        ];
    }
}
