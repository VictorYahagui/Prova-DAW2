@extends('partials.layout')

@section('content')
    <h2>Novo jogador</h2>
    <div class="my-4">
        <a class="btn btn-primary" href="{{ route('jogadores.index') }}">
            Listar jogadores
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('jogadores.store') }}">
                @csrf
                <div class="form-group">
                    <label>Nome do jogador</label>
                    <input
                        type="text"
                        name="nome"
                        class="form-control"
                        value="{{ old('nome') }}"
                        required
                    />
                    @if($errors->has('nome'))
                        <small class="text-helper text-danger">{{ $errors->first('nome') }}</small>
                    @endif
                </div>
                <div class="form-group mt-3">
                    <label>Data de nascimento</label>
                    <input
                        type="date"
                        name="data_nascimento"
                        class="form-control"
                        value="{{ old('data_nascimento') }}"
                        required
                    />
                    @if($errors->has('data_nascimento'))
                        <small class="text-helper text-danger">{{ $errors->first('data_nascimento') }}</small>
                    @endif
                </div>
                <div class="form-group mt-3">
                    <label>Clube</label>
                    <select name="clube_id" class="form-control" required>
                        <option value="">Selecione</option>
                        @foreach($clubes as $clube)
                            <option
                                value="{{ $clube->id }}"
                                {{ intval(old('clube_id')) === $clube->id ? 'selected' : '' }}
                            >{{ $clube->nome }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('clube_id'))
                        <small class="text-helper text-danger">{{ $errors->first('clube_id') }}</small>
                    @endif
                </div>
                <div class="form-group mt-3">
                    <label>Posição</label>
                    <select name="posicao_id" class="form-control" required>
                        <option value="">Selecione</option>
                        @foreach($posicoes as $posicao)
                            <option
                                value="{{ $posicao->id }}"
                                {{ intval(old('posicao_id')) === $posicao->id ? 'selected' : '' }}
                            >{{ $posicao->descricao }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('posicao_id'))
                        <small class="text-helper text-danger">{{ $errors->first('posicao_id') }}</small>
                    @endif
                </div>
                <div class="form-check mt-3">
                    <input
                        type="checkbox"
                        name="possui_figurinha"
                        class="form-check-input"
                        id="possuiFigurinhaCheck"
                        value="true"
                        {{ boolval(old('possui_figurinha')) ? 'checked' : '' }}
                    />
                    <label class="form-check-label" for="possuiFigurinhaCheck">
                        Possui figurinha
                    </label>
                    @if($errors->has('possui_figurinha'))
                        <small class="text-helper text-danger">{{ $errors->first('possui_figurinha') }}</small>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary mt-3">
                    Salvar
                </button>
            </form>
        </div>
    </div>
@endsection
