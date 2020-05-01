<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RamoAtividade;

class RamoAtividadeController extends Controller
{

    public function index()
    {
        $ramo_atividades = RamoAtividade::all();
        return view('RamoAtividade.index', compact('ramo_atividades'));
    }

    public function create()
    {
        return view('RamoAtividade.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:100|unique:ramo_atividades',
            'descricao' => 'nullable'
        ]);

        $ramo_atividades = new RamoAtividade();
        $ramo_atividades->nome = $request->input('nome');
        $ramo_atividades->descricao = $request->input('descricao');
        $ramo_atividades->save();

        return redirect('/RamoAtividade');
    }


    public function show($id)
    {
        $id = decrypt($id);
        $ramo_atividades = RamoAtividade::findOrFail($id);

        return view('RamoAtividade.show', compact('ramo_atividades'));
    }


    public function edit($id)
    {
        $id = decrypt($id);
        $ramo_atividades = RamoAtividade::findOrFail($id);

        return view('RamoAtividade.edit', compact('ramo_atividades'));
    }


    public function update(Request $request, $id)
    {
        $id = decrypt($id);
        $request->validate([
            'nome' => 'required|max:100|unique:ramoAtividades',
            'descricao' => 'nullable'
        ]);

        $ramo_atividades = RamoAtividade::findOrFail($id);
        $ramo_atividades->nome = $request->input('nome');
        $ramo_atividades->descricao = $request->input('descricao');
        $ramo_atividades->save();
        
        return redirect('/RamoAtividade');
    }


    public function destroy($id)
    {
        $id = decrypt($id);
        $ramo_atividades = RamoAtividade::findOrFail($id);
        $ramo_atividades -> delete();

        return redirect('/RamoAtividade');
    }
}
