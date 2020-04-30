<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Telefone;
use Illuminate\Http\Request;

class TelefoneController extends Controller
{
    public function index()
    {
        $telefones = Telefone::all();
        return view('Telefone.index', compact('telefones'));
    }

    public function create()
    {
        return view('Telefone.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|max:15|unique:telefones',
            'observacao' => 'nullable|max:40',
            'possui_whatsapp' => 'nullable'
        ]);

        $telefones = new Telefone();
        $telefones->numero = $request->input('numero');
        $telefones->observacao = $request->input('observacao');
        $telefones->possui_whatsapp = $request->input('possui_whatsapp');
        $telefones->save();

        return redirect('/Telefone');
    }

    public function show($id)
    {
        $id = decrypt($id);
        $telefones = Telefone::findOrFail($id);

        return view('Telefone.show', compact('telefones'));
    }

    public function edit($id)
    {
        $id = decrypt($id);
        $telefones = Telefone::findOrFail($id);

        return view('Telefone.edit', compact('telefones'));
    }

    public function update(Request $request, $id)
    {
        $id = decrypt($id);
        $request->validate([
            'numero' => 'required|max:15|unique:telefones',
            'observacao' => 'nullable|max:40',
            'possui_whatsapp' => 'nullable'
        ]);

        $telefones = Telefone::findOrFail($id);
        $telefones->numero = $request->input('numero');
        $telefones->observacao = $request->input('observacao');
        $telefones->possui_whatsapp = $request->input('possui_whatsapp');
        $telefones->save();
        
        return redirect('/Telefone');
    }

    public function destroy($id)
    {
        $id = decrypt($id);
        $telefones = Telefone::findOrFail($id);
        $telefones -> delete();

        return redirect('/Telefone');
    }
}
