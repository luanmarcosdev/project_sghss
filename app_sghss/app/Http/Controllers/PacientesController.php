<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PacientesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nome' => 'required|string|max:255',
                'data_nascimento' => 'required|date',
                'telefone' => 'required|string|max:20',
                'email' => 'required|email|max:255|unique:pacientes,email',
                'historico_clinico' => 'nullable|string|max:1000',
            ]);

            $paciente = Paciente::create([
                'nome' => $request->nome,
                'data_nascimento' => $request->data_nascimento,
                'telefone' => $request->telefone,
                'email' => $request->email,
                'historico_clinico' => $request->historico_clinico,
            ]);

            return response()->json([
                'message' => 'Paciente criado com sucesso',
                'paciente' => $paciente
            ], 201);
        } catch (ValidationException $e) {
            // Retorna os erros de validação em formato JSON
            return response()->json([
                'errors' => $e->errors()
            ], 422);
        }
    }

}
