@extends('partials.layout')

@section('content')
    <h2>Posições</h2>
    <div class="my-4">
        <a class="btn btn-primary" href="{{ route('posicoes.create') }}">
            Nova posição
        </a>
    </div>
    <table class="table table-striped table-hovered">
        <thead>
            <tr>
                <th>#</th>
                <th>Descrição</th>
                <th>Cadastro em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posicoes as $posicao)
                <tr>
                    <td>{{ $posicao->id }}</td>
                    <td>{{ $posicao->descricao }}</td>
                    <td>{{ $posicao->created_at }}</td>
                    <td>
                        <a href="{{ route('posicoes.edit', $posicao) }}" class="btn btn-sm btn-secondary">
                            Editar
                        </a>
                        <form
                            method="post"
                            action="{{ route('posicoes.destroy', $posicao) }}"
                            class="d-inline"
                            onsubmit="return confirm('Você tem certeza que deseja excluir esta posição?')"
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
