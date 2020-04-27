<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller {

    public function index() {

        $produtos = Produto::all();
        return view('produtos.index', compact(['produtos']));

    }

    public function create() {

        return view('produtos.create');

    }

    public function duplicate($id) {

        $procurar = Produto::findOrFail($id);
        $produto = new Produto;
        $produto -> descricao = $procurar -> descricao;
        $produto -> preco = $procurar -> preco;
        $produto->save();
        return redirect('/produtos');

    }

    public function store(Request $request) {

        $produto = new Produto();
        $produto -> descricao = $request -> input ('descricao');
        $produto -> preco = $request -> input ('preco');
        $produto -> save();
        return redirect('/produtos');

    }

    
    public function show($id) {

        $produto = Produto::FindOrFail($id);
        return view('produtos.show',compact(['produto']));

    }

    public function edit($id) {

        $produto = Produto::findOrFail($id);
        return view('produtos.edit', compact(['produto']));

    }

    public function update(Request $request, $id) {
        
        $produto = Produto::findOrFail($id);
        $produto -> descricao = $request -> input ('descricao');
        $produto -> preco = $request -> input ('preco');
        $produto->save();
        return redirect('/produtos');

    }

    public function destroy($id) {

        $produto = Produto::findOrFail($id);
        $produto->delete();
        return redirect('/produtos');
        
    }
}
