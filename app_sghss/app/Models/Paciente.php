<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'data_nascimento', 'telefone', 'email', 'historico_clinico'];

    public $timestamps = false;

    // Relacionamento com Consultas (Paciente tem muitas consultas)
    public function consultas()
    {
        return $this->hasMany(Consulta::class);
    }
}
