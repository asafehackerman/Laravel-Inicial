<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use App\Models\Curso;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DisciplinaController extends Controller
{
    public function index()
    {
        $disciplina = Disciplina::all();
        return view('disciplina.index', compact('disciplina'));
    }

    public function create()
    {
        $curso = Curso::all();
        return view('disciplina.create', compact('curso'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'aulas' => 'required|integer',
            'curso' => 'required|exists:cursos,id',
        ]);

        Disciplina::create([
            'nome' => $request->nome,
            'aulas' => $request->aulas,
            'curso_id' => $request->curso,
        ]);

        return redirect()->route('disciplina.index');
    }

    public function edit($id)
    {
        $disciplina = Disciplina::findOrFail($id);
        $curso = Curso::all();

        return view('disciplina.edit', compact('disciplina', 'curso'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string',
            'aulas' => 'required|integer',
            'curso' => 'required|exists:cursos,id',
        ]);

        $disciplina = Disciplina::findOrFail($id);

        $disciplina->update([
            'nome' => $request->nome,
            'aulas' => $request->aulas,
            'curso_id' => $request->curso,
        ]);

        return redirect()->route('disciplina.index');
    }

    public function destroy($id)
    {
        Disciplina::destroy($id);

        return redirect()->route('disciplina.index');
    }

    public function report() {
        $disciplina = Disciplina::all();

        $pdf = Pdf::loadView('disciplina.report', ['disciplina' => $disciplina]);

        return $pdf->stream('document.pdf');
    }
}
