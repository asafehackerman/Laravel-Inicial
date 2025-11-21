<?php

namespace App\Http\Controllers;


use App\Models\Aluno;
use App\Models\Curso;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $curso = Curso::all();
        // dd($curso);
        return view ('curso.index', compact('curso'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('curso.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $curso = new Curso();
        
        $curso->nome = mb_strtoupper($request->nome, 'UTF-8');
        $curso->duracao = $request->duracao;
        $curso->save();
        
        return redirect() -> route('curso.index');
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
    public function edit(string $id) {
        $curso = Curso::findOrFail($id);

        return view('curso.edit', compact('curso'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        $curso = Curso::findOrFail($id);

        $curso->nome = mb_strtoupper($request->nome, 'UTF-8');
        $curso->duracao = $request->duracao;
        $curso->save();
    
        return redirect()->route('curso.index');
    }
        

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        $curso = Curso::findOrFail($id);
        $curso->delete();

        return redirect()->route('curso.index');
    }

    public function report() {
        $curso = Curso::with('disciplina')->get();

        $pdf = Pdf::loadView('curso.report', ['curso' => $curso]);

        return $pdf->stream('document.pdf');
    }



}
