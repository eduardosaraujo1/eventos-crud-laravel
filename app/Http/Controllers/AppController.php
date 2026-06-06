<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function home()
    {
        $eventos = Evento::take(5)->get();

        return view('home', ['eventos' => $eventos]);
    }

    public function quem_somos()
    {
        return view('quem-somos');
    }

    public function contato()
    {
        return view('contato');
    }

    public function eventos()
    {
        $eventos = Evento::all();

        return view('eventos', ['eventos' => $eventos]);
    }

    public function createEvento()
    {
        return view('evento_create');
    }

    public function storeEvento(Request $request)
    {
        $e = $request->only(['nome', 'preco', 'quantidade']);
        Evento::create($e);

        return redirect()->route('dashboard');
    }

    public function editEvento(int $id)
    {
        return view('evento_edit', ['evento' => Evento::find($id)]);
    }

    public function updateEvento(Request $request, int $id)
    {
        $dados = $request->only(['nome', 'preco', 'quantidade']);
        $evento = Evento::find($id);

        $evento->update($dados);

        return redirect()->route('dashboard');
    }

    public function destroyEvento(int $id)
    {
        Evento::find($id)->delete();

        return redirect(route('dashboard'));
    }
}
