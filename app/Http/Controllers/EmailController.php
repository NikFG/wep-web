<?php

namespace App\Http\Controllers;

use App\Email;
use Illuminate\Http\Request;

class EmailController extends Controller {

    public function index() {
        $emails = Email::all();
        return view('email.index', compact('emails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('email.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'endereco' => 'email address',
        ]);
        $email = new Email();
        $email->endereco = $request->input('endereco');

        $email->save();
        return redirect('/email');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $id = decrypt($id);
        $email = Email::findOrFail($id);

        return view('email.show', compact('email'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $id = decrypt($id);
        $email = Email::findOrFail($id);
        return view('email.edit', compact('email'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $id = decrypt($id);
        $request->validate([
            'endereco' => 'email address',
        ]);
        $email = Email::findOrFail($id);
        $email->endereco = $request->input('endereco');

        $email->save();
        return redirect('/email');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $id = decrypt($id);
        $email = Email::findOrFail($id);
        $email->delete();

        return redirect('/email');
    }
}
