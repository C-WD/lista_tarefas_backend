<?php

namespace App\Http\Controllers;

use App\Models\SaveFromApi;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class TodoController extends Controller
{
    public function index($nome)
    {
        $id_cliente = env('ID_CLIENTE');
        $secret_cliente = env('SEGREDO_CLIENTE');
        $nome = str_replace(' ', '%20', $nome);
        $response = Http::withBasicAuth($id_cliente, $secret_cliente)
            ->get("https://www.udemy.com/api-2.0/courses/?search=$nome")
            ->json();
        $cursos = $response['results'];
        $listaNomes = [];
        foreach ($cursos as $key => $curso) {
            $listaNomes[$key]['id'] = $curso['id'];
            $listaNomes[$key]['nome'] = $curso['title'];
        }
        return response()->json($listaNomes);
    }

    public function show()
    {
        return Inertia::render('Todo');
    }

    public function cursoDetalhe($id)
    {
        return Inertia::render('TodoDetail', [
            'id' => $id,
        ]);
    }

    public function cursoDetalhes($id)
    {
        if (SaveFromApi::where('codigo', $id)->exists()) {
            $response = SaveFromApi::where('codigo', $id)->first();
            $response = $response->objeto;
            return response()->json(json_decode($response));
        } else {
            $id_cliente = env('ID_CLIENTE');
            $secret_cliente = env('SEGREDO_CLIENTE');
            $response = Http::withBasicAuth($id_cliente, $secret_cliente)
                ->get("https://www.udemy.com/api-2.0/courses/$id/public-curriculum-items/?fields[lecture]=@all,durationInSeconds")
                // ->get("https://www.udemy.com/api-2.0/courses/$id/?fields[course]=id,title,content_length_video") // Para pegar o tempo de aulas
                ->json();
            $quantidadeAulas = $response['count'];
            $listaAulas = [];
            $listaAulas[0] = $response['results'];
            $contador = 1;
            while (true) {
                if ($response['next'] == null) {
                    break;
                } else {
                    $response = Http::withBasicAuth($id_cliente, $secret_cliente)
                        ->get($response['next'])
                        ->json();
                    $listaAulas[$contador] = $response['results'];
                }
                $contador++;
            }
            $listaAulas = array_merge(...$listaAulas);
            $listaAulas = Json_encode($listaAulas);
            $saveFromApi = new SaveFromApi();
            $saveFromApi->codigo = $id;
            $saveFromApi->objeto = $listaAulas;
            $saveFromApi->save();
            return response()->json(json_decode($listaAulas));
        }
    }
}
