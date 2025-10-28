<?php
// https://github.com/OverbeckSilvaLeonardo/laravel-exercicios
namespace App\Http\Controllers;

use App\Http\Requests\EventoRequest;
use App\Models\Evento;
use App\Models\Ingresso;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listar(Request $request)
    {
        $filtro = $request->get('filtro');
        $consulta = Ingresso::query()
            ->with('evento');

        if (!empty($filtro)) {
            $consulta->where('nome', 'like', '%' . $filtro . '%');;
        }

        $eventos = $consulta->get();

        return ['message' => 'Listando os eventos do sistema', 'eventos' => $eventos->toArray()];
    }

    public function buscar(string $id) {
        $evento = Evento::find($id);

        dd($evento->ingressos());

        return ['message' => 'Listando o evento ID ' . $id, 'eventos' => $evento->toArray()];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function criar(EventoRequest $request)
    {
        $validado = $request->all();

        $evento = new Evento;
        $evento->nome = $validado['nome'];
        $evento->data_inicio = $validado['data_inicio'];
        $evento->data_fim = $validado['data_fim'];
        $evento->save();

        return ['message' => 'Criando eventos do sistema'];
    }

    public function editar(string $id, EventoRequest $request)
    {
        $validado = $request->all();

        $evento = Evento::find($id);
        $evento->nome = $validado['nome'];
        $evento->data_inicio = $validado['data_inicio'];
        $evento->data_fim = $validado['data_fim'];
        $evento->save();

        return ['message' => 'Evento editado sucesso'];
    }

    /**
     * Display the specified resource.
     */
    public function excluir(int $id)
    {
        $evento = Evento::find($id);
        $evento->delete();

        return ['message' => 'Rota dentro do Grupo - Excluindo eventos do sistema ' . $id];
    }

}
