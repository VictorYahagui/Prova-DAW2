@extends('partials.layout')

@section('styles')
    <style>
        .clube-escudo {
            width: 100px;
            height: auto;
            border-radius: 6px;
        }
    </style>
@endsection

@section('content')
    <h2>Jogadores</h2>
    <div class="my-4">
        <a class="btn btn-primary" href="{{ route('jogadores.create') }}">
            Novo jogador
        </a>
    </div>
    <table class="table table-striped table-hovered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Dt Nascimento</th>
                <th>Clube</th>
                <th>Posição</th>
                <th>Possui figurinha?</th>
                <th>Cadastro em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jogadores as $jogador)
                <tr>
                    <td>{{ $jogador->id }}</td>
                    <td>{{ $jogador->nome }}</td>
                    <td>{{ $jogador->data_nascimento }}</td>
                    <td>
                        <img src="{{ $jogador->clube->escudo }}" class="clube-escudo">
                        {{ $jogador->clube->nome }}
                    </td>
                    <td>{{ $jogador->posicao->descricao }}</td>
                    <td>{{ $jogador->possui_figurinha ? 'Sim' : 'Não' }}</td>
                    <td>{{ $jogador->created_at }}</td>
                    <td>
                        <a href="{{ route('jogadores.edit', $jogador) }}" class="btn btn-sm btn-secondary">
                            Editar
                        </a>
                        <form
                            method="post"
                            action="{{ route('jogadores.destroy', $jogador) }}"
                            class="d-inline"
                            onsubmit="return confirm('Você tem certeza que deseja excluir este jogador?')"
                        >
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger btn-delete">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
