<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mina extends Model
{
    //use HasFactory;
    protected $table= 'minas';
    protected $primaryKey="id";
    protected $fillable = [ 'id', 'fecha', 'lote', 'nombre', 'pesoBruto', 'pesoTaza', 'placa', 'zinc','plata','plomo','antimonio','Observaciones'];
}
