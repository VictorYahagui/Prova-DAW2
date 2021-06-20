<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Clube;
use App\Models\Posicao;

class Jogador extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'jogadores';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Get the clube that owns the jogador.
     */
    public function clube()
    {
        return $this->belongsTo(Clube::class);
    }

    /**
     * Get the posicao that owns the jogador.
     */
    public function posicao()
    {
        return $this->belongsTo(Posicao::class);
    }
}
