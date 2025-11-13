<?php

namespace App\Http\Controllers;


use App\Models\Aluno;
use App\Models\Curso;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aluno = Aluno::all();
        // dd($aluno);
        return view ('aluno.index', compact('aluno'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $curso = Curso::all();
        return view('aluno.create', compact('curso'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $curso = Curso::find($request->curso);
        
        if(isset($curso)) {
            $aluno = new Aluno();
            $aluno->nome = mb_strtoupper($request->nome, 'UTF-8');
            $aluno->ano = $request->ano;
            $aluno->curso()->associate($curso);
            $aluno->save();
            
            if($request->hasFile('foto')) {
                // Upload File
                $extensao_arq = $request->file('foto')->getClientOriginalExtension();
                $name = $aluno->id.'_'.time().'.'.$extensao_arq;
                $request->file('foto')->storeAs('fotos', $name, ['disk' => 'public']);
                $aluno->foto = 'fotos/'.$name;
                $aluno->save();
            }
        }
        
        return redirect() -> route('aluno.index');
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
        $aluno = Aluno::find($id);
        
        if(isset($aluno)) {
            $cursos = Curso::all();
            return view('aluno.edit', compact(['aluno', 'cursos']));
        }

        return redirect()->route('aluno.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        $aluno = Aluno::find($id);
        $curso = Curso::find($request->curso);
        
        if(isset($curso) && isset($aluno)) {
            $aluno->nome = mb_strtoupper($request->nome, 'UTF-8');
            $aluno->ano = $request->ano;
            $aluno->curso()->associate($curso);
            if($request->hasFile('foto')) {
                // Upload File
                $extensao_arq = $request->file('foto')->getClientOriginalExtension();
                $name = $aluno->id.'_'.time().'.'.$extensao_arq;
                $request->file('foto')->storeAs('fotos', $name, ['disk' => 'public']);
                $aluno->foto = 'fotos/'.$name;
            }
            $aluno->save();
        }
    
        return redirect()->route('aluno.index');
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
        
        return redirect() -> route('aluno.index');
    }

    public function report() {
        $aluno = Aluno::with(['curso'])->get();
        // Gera um PDF a partir de uma view Blade
        $pdf = Pdf::loadView('aluno.report', ['aluno' => $aluno]);
        // Exibe o PDF no navegador
        return $pdf->stream('document.pdf');
        // Ou Faz o download do PDF
        // return $pdf->download('document.pdf');
    }
}
