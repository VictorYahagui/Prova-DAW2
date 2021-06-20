<?php

namespace Database\Seeders;

use App\Models\Posicao;
use Illuminate\Database\Seeder;

class PosicaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posicoes = [
            ['descricao' => 'Goleiro'],
            ['descricao' => 'Defensor'],
            ['descricao' => 'Lateral'],
            ['descricao' => 'Volante'],
            ['descricao' => 'Meio'],
            ['descricao' => 'Atacante'],
        ];

        Posicao::factory()->createMany($posicoes);
    }
}
