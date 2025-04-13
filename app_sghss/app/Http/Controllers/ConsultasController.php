<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Paciente;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ConsultasController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Paciente $paciente)
    {
        try {
            $validated = $request->validate([
                'data_hora' => 'required|date',
                'tipo' => 'required|in:Presencial,Telemedicina',
                'status' => 'required|in:Agendada,Realizada,Cancelada',
                'prontuario' => 'nullable|string',
            ]);
        
            $consulta = $paciente->consultas()->create($validated);
        
            return response()->json([
                'message' => 'Consulta agendada com sucesso!',
                'consulta' => $consulta
            ], 201);
        } catch (ValidationException $e) {
            return response()->json(['message' => $e->errors()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Consulta::destroy($id);
        return response()->json([
            'message' => 'Consulta cancelada com sucesso'
        ], 200);
    }
}
