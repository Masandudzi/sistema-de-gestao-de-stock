<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Requisicao;

class Material extends Model
{
    use HasFactory;
    protected $fillable = [
      'nome',
      'qtd_disponivel',
    ];

    /**
     * Get the entradas for the material.
     */
    public function entradas()
    {
        return $this->hasMany(Entrada::class);
    }

    public function requisicoes()
    {
        return $this->belongsToMany(Requisicao::class, 'material_requisicaos');
    }
}
