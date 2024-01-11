<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TodoController extends Controller
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
        dd($request->all());
        // $request->validate([
        //     'nome' => 'required',
        // ]);

        // $nome = $request->nome;

        // $cursos = Http::withBasicAuth(env('ID_CLIENTE'), env('SEGREDO_CLIENTE'))
        //     ->get("https://www.udemy.com/api-2.0/courses/?search=$nome")
        //     ->json()['results'];
        // $listaNomes = [];
        // foreach ($cursos as $key => $curso) {
        //     $listaNomes[$key]['id'] = $curso['id'];
        //     $listaNomes[$key]['nome'] = $curso['title'];
        // }
        // return response()->json($cursos);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
