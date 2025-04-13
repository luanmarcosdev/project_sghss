<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_id', 'profissional_id', 'data_hora', 'tipo', 'status', 'prontuario'
    ];

    // Relacionamento com Paciente (Consulta pertence a um Paciente)
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
