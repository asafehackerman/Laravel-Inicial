<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursoSeeder extends Seeder {
    public function run(): void
    {
        $data = [
            ["nome" => "TÉCNICO EM INFORMÁTICA", "duracao" => 4],
            ["nome" => "TECNÓLOGO EM DESENVOLVIMENTO", "duracao" => 3],
        ];

        DB::table('cursos')->insert($data);
    }
}
