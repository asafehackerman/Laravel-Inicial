<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    use SoftDeletes;

    protected $table = 'cursos';

    protected $fillable = [
        'nome',
        'duracao'
    ];

    public function aluno()
    {
        return $this->hasMany(Aluno::class);
    }

    public function disciplina()
    {
        return $this->hasMany(Disciplina::class);
    }
}
