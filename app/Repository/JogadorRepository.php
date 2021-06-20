<?php

namespace App\Repository;

use App\Models\Jogador;

class JogadorRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Jogador;
    }

    public function getAll()
    {
        return $this
            ->model
            ->with(['clube', 'posicao'])
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
