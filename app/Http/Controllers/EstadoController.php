<?php

namespace App\Http\Controllers;

use App\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller {

    public function index() {
        $estados = Estado::all();
        return view('Estado.index', compact('estados'));
    }
    public function indexDeleted() {
        $estados = Estado::onlyTrashed()->get();
        return view('Estado.indexDeleted', compact('estados'));
    }

    public function create() {
        return view('Estado.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nome' => 'required|max:20',
            'sigla' => 'required|max:2',
        ]);

        $estados = new Estado();
        $estados->nome = $request->input('nome');
        $estados->sigla = $request->input('sigla');
        $estados->save();
        
        return redirect('/Estado');
    }

    public function show($id) {
        $estados = Estado::findOrFail($id);
        return view('Estado.show', compact(['estados']));
    }

    public function edit($id) {
        $estados = Estado::findOrFail($id);
        return view('Estado.edit', compact(['estados']));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nome' => 'required|max:20',
            'sigla' => 'required|max:2',
        ]);

        $estados = Estado::findOrFail($id);
        $estados->nome = $request->input('nome');
        $estados->sigla = $request->input('sigla');
        $estados->save();
        return redirect('/Estado');
    }

    public function destroy($id) {
        $estados = Estado::findOrFail($id);
        $estados->delete();
        return redirect('/Estado');
    }
}
