<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Pessoa;
use Illuminate\Http\Request;

class ClienteController extends Controller {
    public function index() {
        $clientes = Cliente::all();
        return view('Cliente.index', compact('clientes'));
    }

    public function create() {
        $pessoas = Pessoa::all();
        return view('Cliente.create', compact('pessoas'));
    }

    public function store(Request $request) {
        $request->validate([
            'limite_credito' => 'nullable|numeric|min:0',
            'bloqueado' => 'nullable',
            'data_encerramento' => 'nullable',
            'data_nascimento' => 'nullable',
            'pessoa_id' => 'required|exists:pessoas',
        ]);
        $cliente = new Cliente();
        $cliente->limite_credito = $request->has('limite_credito');
        $cliente->bloqueado = $request->has('bloqueado');
        $cliente->data_encerramento = $request->input('data_encerramento');
        $cliente->data_nascimento = $request->input('data_nascimento');
        $cliente->pessoa_id = $request->input('pessoa_id');
        $cliente->save();
        return redirect('/clientes');
    }

    public function show($id) {
        $id = decrypt($id);
        $cliente = Cliente::findOrFail($id);
        return view('Cliente.show', compact('cliente'));
    }

    public function edit($id) {
        $cliente = Cliente::findOrFail($id);
        $pessoas = Pessoa::all();
        return view('Cliente.edit', compact('cliente', 'pessoas'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'limite_credito' => 'nullable|numeric|min:0',
            'bloqueado' => 'nullable',
            'data_encerramento' => 'nullable',
            'data_nascimento' => 'nullable',
            'pessoa_id' => 'required|exists:pessoas',
        ]);
        $cliente = Cliente::findOrFail($id);
        $cliente->limite_credito = $request->has('limite_credito');
        $cliente->bloqueado = $request->has('bloqueado');
        $cliente->data_encerramento = $request->input('data_encerramento');
        $cliente->data_nascimento = $request->input('data_nascimento');
        $cliente->pessoa_id = $request->input('pessoa_id');
        $cliente->save();
        return redirect('/clientes');
    }

    public function destroy($id) {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
    }
}
