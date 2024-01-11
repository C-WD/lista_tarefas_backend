<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cursos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'nome' => 'required',
        ]);

        $nome = $request->nome;

        $cursos = Http::withBasicAuth(env('ID_CLIENTE'), env('SEGREDO_CLIENTE'))
            ->get("https://www.udemy.com/api-2.0/courses/?search=$nome")
            ->json()['results'];
        $listaNomes = [];
        foreach ($cursos as $key => $curso) {
            $listaNomes[$key]['id'] = $curso['id'];
            $listaNomes[$key]['nome'] = $curso['title'];
        }
        return response()->json($listaNomes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required',
        ]);

        $codigo = $request->codigo;

        $existe = Cursos::where('codigo', $codigo)->first();

        if (!empty($existe)) {
            return response()->json([
                "message" => "Curso já cadastrado!",
                'id' => $existe->id,
            ], 200);
        }

        $cursos = Http::withBasicAuth(env('ID_CLIENTE'), env('SEGREDO_CLIENTE'))
            // ->get("https://www.udemy.com/api-2.0/courses/?search=$codigo?fields[course]=CourseDurationInSeconds")
            // ->get("https://www.udemy.com/api-2.0/courses/$codigo/public-curriculum-items/?fields[lecture]=@all,durationInSeconds")
            ->get("https://www.udemy.com/api-2.0/courses/$codigo?fields[course]=content_length_video,title")
            ->json();
        $curso = Cursos::create([
            'nome' => $cursos['title'],
            'codigo' => $cursos['id'],
            'duracao' => $cursos['content_length_video'],
        ])->save();
        return response()->json([
            "message" => "Curso cadastrado com sucesso!",
            'id' => $curso['id'],
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $curso = Cursos::where('id', $id)->first();
        if (empty($curso)) {
            return response()->json([
                "message" => "Curso não encontrado!",
            ], 200);
        }
        return response()->json($curso);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'atualizar' => 'boolean|required',
        ]);

        $atualizar = $request->atualizar;

        if($atualizar){
            try {
                $curso = Cursos::where('id', $id)->first();
                $codigo = $curso->codigo;
                $cursos = Http::withBasicAuth(env('ID_CLIENTE'), env('SEGREDO_CLIENTE'))
                    ->get("https://www.udemy.com/api-2.0/courses/$codigo?fields[course]=content_length_video,title")
                    ->json();
                $curso->fill([
                    'nome' => $cursos['title'],
                    'codigo' => $cursos['id'],
                    'duracao' => $cursos['content_length_video'],
                ])->save();
                return response()->json([
                    "message" => "Curso atualizado com sucesso!",
                    'id' => $cursos['id'],
                ], 200);
            } catch (\Throwable $th) {
                return response()->json([
                    "message" => "Curso não atualizado!",
                ], 200);
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $curso = Cursos::where('id', $id)->first();
        if (empty($curso)) {
            return response()->json([
                "message" => "Curso não encontrado!",
            ], 200);
        }
        $curso->delete();
        return response()->json([
            "message" => "Curso deletado com sucesso!",
        ], 200);
    }
}
