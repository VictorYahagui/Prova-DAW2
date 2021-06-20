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
    <h2>Clubes</h2>
    <div class="my-4">
        <a class="btn btn-primary" href="{{ route('clubes.create') }}">
            Novo clube
        </a>
    </div>
    <table class="table table-striped table-hovered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome do clube</th>
                <th>Escudo</th>
                <th>Cadastro em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clubes as $clube)
                <tr>
                    <td>{{ $clube->id }}</td>
                    <td>{{ $clube->nome }}</td>
                    <td>
                        <a href="{{ $clube->escudo }}" target="_blank">
                            <img src="{{ $clube->escudo }}" class="clube-escudo">
                        </a>
                    </td>
                    <td>{{ $clube->created_at }}</td>
                    <td>
                        <a href="{{ route('clubes.edit', $clube) }}" class="btn btn-sm btn-secondary">
                            Editar
                        </a>
                        <form
                            method="post"
                            action="{{ route('clubes.destroy', $clube) }}"
                            class="d-inline"
                            onsubmit="return confirm('Você tem certeza que deseja excluir este clube?')"
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
