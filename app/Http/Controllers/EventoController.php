<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listar(Request $request)
    {
        $filtro = $request->get('filtro');

        dd($filtro);

        $consulta = Evento::query();

        $eventos = $consulta->get();

        return ['message' => 'Listando os eventos do sistema', 'eventos' => $eventos->toArray()];
    }

    public function buscar(string $id) {
        $consulta = Evento::query();

        $consulta->where('id', $id); // id = 1
//        $consulta->where('id', '>', $id); // id > 1


        $evento = $consulta->get()->first();



        return ['message' => 'Listando o evento ID ' . $id, 'eventos' => $evento->toArray()];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function criar()
    {
        return ['message' => 'Criando eventos do sistema'];
    }

    /**
     * Display the specified resource.
     */
    public function excluir(int $id)
    {
        return ['message' => 'Rota dentro do Grupo - Excluindo eventos do sistema ' . $id];
    }

}
