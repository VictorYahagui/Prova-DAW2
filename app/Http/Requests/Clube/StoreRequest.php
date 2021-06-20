<?php

namespace App\Http\Requests\Clube;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'nome' => ['required'],
            'escudo' => ['required', 'image', 'mimes:jpeg,png'],
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Informe o nome do clube.',
            'escudo.required' => 'Escolha a imagem do escudo do clube.',
            'escudo.image' => 'O escudo do clube precisa estar no formato de imagem.',
            'escudo.mimes' => 'A imagem precisa estar no formato JPG ou PNG.',
        ];
    }
}
