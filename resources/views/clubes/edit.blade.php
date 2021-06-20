@extends('partials.layout')

@section('styles')
    <style>
        .clube-escudo {
            width: 100px;
            height: auto;
            border-radius: 6px;
        }

        .escudo-wrapper {
            gap: 20px;
        }
    </style>
@endsection

@section('content')
    <h2>Editar clube: {{ $clube->nome }}</h2>
    <div class="my-4">
        <a class="btn btn-primary" href="{{ route('clubes.index') }}">
            Listar clubes
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('clubes.update', $clube) }}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label>Nome</label>
                    <input
                        type="text"
                        name="nome"
                        class="form-control"
                        placeholder="Ex.: Flamengo"
                        value="{{ old('nome', $clube->nome) }}"
                        required
                    />
                    @if($errors->has('nome'))
                        <small class="text-helper text-danger">{{ $errors->first('nome') }}</small>
                    @endif
                </div>
                <div class="escudo-wrapper d-flex mt-3">
                    <div class="escudo">
                        <a href="{{ $clube->escudo }}" target="_blank">
                            <img src="{{ $clube->escudo }}" class="clube-escudo">
                        </a>
                    </div>
                    <div class="form-group">
                        <label>Escudo do clube (PNG ou JPG)</label>
                        <input
                            type="file"
                            name="escudo"
                            class="form-control"
                            accept="image/*"
                        />
                        <small class="text-helper text-muted">Selecione apenas se quiser alterar.</small>
                        @if($errors->has('escudo'))
                            <small class="text-helper text-danger">{{ $errors->first('escudo') }}</small>
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">
                    Salvar
                </button>
            </form>
        </div>
    </div>
@endsection
