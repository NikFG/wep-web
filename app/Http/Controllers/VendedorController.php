<?php

namespace App\Http\Controllers;

use App\Pessoa;
use App\Vendedor;
use Illuminate\Http\Request;

class VendedorController extends Controller {

    public function index() {
        $vendedores = Vendedor::all();
        return view('Vendedor.index', compact('vendedores'));
    }

    public function create() {
        $pessoas = Pessoa::all();
        return view('Vendedor.create', compact('pessoas'));
    }

    public function store(Request $request) {
        $request->validate([
            'callcenter' => 'required',
            'externo' => 'required',
            'pessoa_id' => 'required|exists:pessoas',
        ]);
        $vendedor = new Vendedor();
        $vendedor->callcenter = $request->has('callcenter');
        $vendedor->externo = $request->has('externo');
        $vendedor->pessoa_id = $request->input('pessoa_id');
        $vendedor->save();
        return redirect('/vendedores');
    }

    public function show($id) {
        $id = decrypt($id);
        $vendedor = Vendedor::findOrFail($id);
        return view('Vendedor.show', compact('vendedor'));
    }

    public function edit($id) {
        $vendedor = Vendedor::findOrFail($id);
        $pessoas = Pessoa::all();
        return view('Vendedor.edit', compact('vendedor', 'pessoas'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'callcenter' => 'required',
            'externo' => 'required',
            'pessoa_id' => 'required|exists:pessoas',
        ]);
        $vendedor = Vendedor::findOrFail($id);
        $vendedor->callcenter = $request->has('callcenter');
        $vendedor->externo = $request->has('externo');
        $vendedor->pessoa_id = $request->input('pessoa_id');
        $vendedor->save();
        return redirect('/vendedores');
    }

    public function destroy($id) {
        $vendedor = Vendedor::findOrFail($id);
        $vendedor->delete();
    }
}
