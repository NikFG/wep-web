<?php

namespace App\Http\Controllers;

use App\Email;
use Illuminate\Http\Request;

class EmailController extends Controller {

    public function index() {
        $emails = Email::all();
        return view('Email.index', compact('emails'));
    }

    public function create() {
        return view('Email.create');
    }

    public function store(Request $request) {
        $request->validate([
            'endereco' => 'email address',
        ]);
        $email = new Email();
        $email->endereco = $request->input('endereco');

        $email->save();
        return redirect('/Email');
    }

    public function show($id) {
        $id = decrypt($id);
        $email = Email::findOrFail($id);

        return view('Email.show', compact('email'));
    }

    public function edit($id) {
        $id = decrypt($id);
        $email = Email::findOrFail($id);
        return view('Email.edit', compact('email'));

    }

    public function update(Request $request, $id) {
        $id = decrypt($id);
        $request->validate([
            'endereco' => 'required|email address|max:50|unique:email',
        ]);
        $email = Email::findOrFail($id);
        $email->endereco = $request->input('endereco');

        $email->save();
        return redirect('/Email');
    }

    public function destroy($id) {
        $id = decrypt($id);
        $email = Email::findOrFail($id);
        $email->delete();

        return redirect('/Email');
    }
}
