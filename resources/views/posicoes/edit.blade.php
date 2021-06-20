@extends('partials.layout')

@section('content')
    <h2>Editar posição: {{ $posicao->descricao }}</h2>
    <div class="my-4">
        <a class="btn btn-primary" href="{{ route('posicoes.index') }}">
            Listar posições
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('posicoes.update', $posicao) }}">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label>Descrição</label>
                    <input
                        type="text"
                        name="descricao"
                        class="form-control"
                        placeholder="Ex.: Goleiro"
                        value="{{ old('descricao', $posicao->descricao) }}"
                        required
                    />
                    @if($errors->has('descricao'))
                        <small class="text-helper text-danger">{{ $errors->first('descricao') }}</small>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary mt-3">
                    Salvar
                </button>
            </form>
        </div>
    </div>
@endsection
