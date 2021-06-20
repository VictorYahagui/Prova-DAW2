<?php

namespace App\Repository;

use App\Models\Posicao;

class PosicaoRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Posicao;
    }
}
