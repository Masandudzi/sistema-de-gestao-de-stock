<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;
    protected $fillable = [
      'codigo',
      'num_requisicao',
      'ordem_compra',
      'fornecedor',
      'qtd_solicitada',
      'qtd_recebida',
      'custo',
      'comentario',
      'material_id',
      'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
