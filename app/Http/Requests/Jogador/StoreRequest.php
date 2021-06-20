<?php

namespace App\Http\Requests\Jogador;

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
            'nome' => ['required'],
            'data_nascimento' => ['required', 'date', 'before:now'],
            'clube_id' => ['required', 'exists:clubes,id'],
            'posicao_id' => ['required', 'exists:posicoes,id'],
            'possui_figurinha' => ['boolean'],
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Informe o nome do jogador.',
            'data_nascimento.required' => 'Informe a data de nascimento do jogador.',
            'data_nascimento.date' => 'Informe uma data válida.',
            'data_nascimento.before' => 'A data de nascimento precisa estar no passado.',
            'clube_id.required' => 'Informe o clube do jogador.',
            'clube_id.exists' => 'Informe um clube válido.',
            'posicao.required' => 'Informe a posição do jogador.',
            'posicao.exists' => 'Informe uma posição válida.',
            'possui_figurinha.boolean' => 'Informe um valor correto para o campo "possui figurinha".',
        ];
    }
}
