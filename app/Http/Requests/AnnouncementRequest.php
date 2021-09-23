<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementRequest extends FormRequest
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
            'price' => 'required|numeric',
            'title' => 'required|max:50',
            'description'=> 'required|max:1000',
            'category_id'=> 'required',
        ];
    }
    public function messages()
    {
        return[
            'price.required' => 'Il prezzo è obbligatorio',
            'price.numeric' => 'Il prezzo deve avere caratteri numerici',
            'title.required' => 'Il nome del prodotto è obbligatorio',
            'title.max'=> 'il titolo deve essere massimo di 20 caratteri',
            'description.required' => 'la descrizione è obbligatoria',
            'description.max' => 'la descrizione deve avere massimo 500 caratteri',
            'category_id'=> 'la scelta di una categoria è obbligatoria',
        ];
    }
}
