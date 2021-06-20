<?php

namespace App\Http\Requests\Jogador;

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

    protected function prepareForValidation()
    {
        $possuiFigurinha = $this->post('possui_figurinha');

        $this->merge([
            'possui_figurinha' => boolval($possuiFigurinha) || false,
        ]);
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
            'data_nascimento' => ['date'],
            'clube_id' => ['exists:clubes,id'],
            'posicao_id' => ['exists:posicoes,id'],
            'possui_figurinha' => ['boolean'],
        ];
    }

    public function messages()
    {
        return [
            'data_nascimento.date' => 'Informe uma data válida.',
            'clube_id.exists' => 'Informe um clube válido.',
            'posicao.exists' => 'Informe uma posição válida.',
            'possui_figurinha.boolean' => 'Informe um valor correto para o campo "possui figurinha".',
        ];
    }
}
