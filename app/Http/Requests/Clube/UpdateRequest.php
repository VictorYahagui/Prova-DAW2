<?php

namespace App\Http\Requests\Clube;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'nome' => [],
            'escudo' => ['image', 'mimes:jpeg,png'],
        ];
    }

    public function messages()
    {
        return [
            'escudo.image' => 'O escudo do clube precisa estar no formato de imagem.',
            'escudo.mimes' => 'A imagem precisa estar no formato JPG ou PNG.',
        ];
    }
}
