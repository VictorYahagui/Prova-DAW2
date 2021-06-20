@extends('partials.layout')

@section('content')
    <h2>Novo clube</h2>
    <div class="my-4">
        <a class="btn btn-primary" href="{{ route('clubes.index') }}">
            Listar clubes
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('clubes.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Nome do clube</label>
                    <input
                        type="text"
                        name="nome"
                        class="form-control"
                        placeholder="Ex.: Flamengo"
                        value="{{ old('nome') }}"
                        required
                    />
                    @if($errors->has('nome'))
                        <small class="text-helper text-danger">{{ $errors->first('nome') }}</small>
                    @endif
                </div>
                <div class="form-group mt-3">
                    <label>Escudo do clube (PNG ou JPG)</label>
                    <input
                        type="file"
                        name="escudo"
                        class="form-control"
                        accept="image/*"
                        required
                    />
                    @if($errors->has('escudo'))
                        <small class="text-helper text-danger">{{ $errors->first('escudo') }}</small>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary mt-3">
                    Salvar
                </button>
            </form>
        </div>
    </div>
@endsection
