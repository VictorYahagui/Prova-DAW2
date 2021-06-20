@extends('partials.layout')

@section('content')
    <h2>Home</h2>
    <p>Escolha o que quer fazer:</p>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="{{ route('posicoes.index') }}" class="nav-link">
                1. Gerenciar posições
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('clubes.index') }}" class="nav-link">
                2. Gerenciar clubes
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('jogadores.index') }}" class="nav-link">
                3. Gerenciar jogadores
            </a>
        </li>
    </ul>
@endsection
