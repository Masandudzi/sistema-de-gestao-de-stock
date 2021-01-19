<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialRequisicao extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = ['material_id','requisicao_id', 'quantidade'];
}
