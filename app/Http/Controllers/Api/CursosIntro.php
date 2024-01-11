<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CursosIntro as ModelsCursosIntro;
use Illuminate\Http\Request;

class CursosIntro extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = ModelsCursosIntro::all();
        return response()->json($cursos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $curso = ModelsCursosIntro::where('codigo', $request->codigo);
        if($curso->exists()){
            return response()->json([
                'message' => 'Curso já cadastrado'
            ], 400);
        }else{
            $request->validate([
                'codigo' => 'required|integer|unique:cursos_intros',
                'nome' => 'required|string',
                'data_inicio' => 'required|date',
                'data_fim' => 'nullable|date',
                'tempo_diario' => 'nullable|integer',
                'sabado_domingo' => 'required|boolean',
                'finalizar_aula' => 'required|boolean',
                'pausa_inicio' => 'nullable|date',
                'pausa_fim' => 'nullable|date',
                'progresso' => 'required|integer',
                'duracao' => 'required|integer',
                'status' => 'required|integer',
                'link' => 'nullable|string'
            ]);

            try {
                ModelsCursosIntro::create($request->all());
            } catch (\Throwable $th) {
                return response()->json([
                    'message' => 'Erro ao cadastrar curso',
                    'error' => $th
                ], 400);
            }

            return response()->json([
                'message' => 'Curso cadastrado com sucesso',
            ], 201);
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $curso = ModelsCursosIntro::find($id);
        if($curso){
            return response()->json($curso);
        }else{
            return response()->json([
                'message' => 'Curso não encontrado'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $curso = ModelsCursosIntro::find($id);
        if($curso){
            $request->validate([
                'nome' => 'required|string',
                'data_inicio' => 'required|date',
                'data_fim' => 'nullable|date',
                'tempo_diario' => 'nullable|integer',
                'sabado_domingo' => 'required|boolean',
                'finalizar_aula' => 'required|boolean',
                'pausa_inicio' => 'nullable|date',
                'pausa_fim' => 'nullable|date',
                'progresso' => 'required|integer',
                'duracao' => 'required|integer',
                'status' => 'required|integer',
                'link' => 'nullable|string'
            ]);

            try {
                $curso->update($request->all());
            } catch (\Throwable $th) {
                return response()->json([
                    'message' => 'Erro ao atualizar curso',
                    'error' => $th
                ], 400);
            }

            return response()->json([
                'message' => 'Curso atualizado com sucesso',
            ], 200);
        }else{
            return response()->json([
                'message' => 'Curso não encontrado'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $curso = ModelsCursosIntro::find($id);
        if($curso){
            try {
                $curso->delete();
            } catch (\Throwable $th) {
                return response()->json([
                    'message' => 'Erro ao deletar curso',
                    'error' => $th
                ], 400);
            }

            return response()->json([
                'message' => 'Curso deletado com sucesso',
            ], 200);
        }else{
            return response()->json([
                'message' => 'Curso não encontrado'
            ], 404);
        }
    }
}
