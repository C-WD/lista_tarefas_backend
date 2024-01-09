<?php

namespace App\Http\Controllers;

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
        foreach ($cursos as $curso) {
            $listaNomes[] = $curso['title'];
        }
        return response()->json($listaNomes);
    }

    public function show()
    {
        return Inertia::render('Todo');
    }
}
