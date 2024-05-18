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
            'krestni_jmeno' => 'required',
            'prijmeni' => 'required',
            'prezdivka' => 'required',
            'heslo' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'krestni_jmeno.required' => 'křestní jméno nesmí být prázdné.',
            'prijmeni.required' => 'příjmenní nesmí být prázdné',
            'prezdivka.required' => 'přezdívka nesmí být prázdná',
            'heslo.required' => 'heslo nesmí být prázdné',
        ];
    }
}
