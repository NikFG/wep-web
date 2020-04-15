<?php

namespace App\Http\Controllers;

use App\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller {

    public function index() {
        $estados = Estado::all();
        $a = "teste";
        return view('estados.index', compact(['estados', 'a']));
    }
    public function indexDeleted() {
        $estados = Estado::onlyTrashed()->get();
        return view('estados.indexDeleted', compact(['estados', 'a']));
    }

    public function create() {
        return view('estados.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nome' => 'required|max:50',
            'sigla' => 'required|max:2',
        ]);
        $estado = new Estado();
        $estado->nome = $request->input('nome');
        $estado->sigla = $request->input('sigla');
        $estado->save();
        return redirect('/estados');
    }

    public function show($id) {
        $estado = Estado::findOrFail($id);
        return view('estados.show', compact(['estado']));
    }

    public function edit($id) {
        $estado = Estado::findOrFail($id);
        return view('estados.edit', compact(['estado']));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nome' => 'required|max:50',
            'sigla' => 'required|max:2',
        ]);
        $estado = Estado::findOrFail($id);
        $estado->nome = $request->input('nome');
        $estado->sigla = $request->input('sigla');
        $estado->save();
        return redirect('/estados');
    }

    public function destroy($id) {
        $estado = Estado::findOrFail($id);
        $estado->delete();
        return redirect('/estados');
    }
}
