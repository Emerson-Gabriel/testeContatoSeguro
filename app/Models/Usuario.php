<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = "tusuarios";
    protected $primaryKey = "idUsuario";
    protected $fillable = ['idUsuario','nome','email','telefone','dataNasc','cidade','idEmpresa'];
}
