<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alunos = Aluno::all();
        // dd($alunos);
        return view ('aluno.index', compact('alunos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aluno.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $aluno = new Aluno();
        $aluno->nome = $request->nome;
        $aluno->curso = $request->curso;
        $aluno->ano = $request->ano;
        $aluno -> save();

        return redirect() -> route('alunos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $aluno = Aluno::find($id);

        if(isset($aluno)) {
            return view('aluno.edit', compact('aluno'));
        }

        return redirect() -> route('alunos.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $aluno = Aluno::find($id);
        
        if(isset($aluno)) {
            $aluno->nome = $request->nome;
            $aluno->curso = $request->curso;
            $aluno->ano = $request->ano;
            $aluno -> save();
        }

        return redirect() -> route('alunos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $aluno = Aluno::find($id);

        if(isset($aluno)) {
            $aluno -> delete();
        }

        return redirect() -> route('alunos.index');
    }
}
