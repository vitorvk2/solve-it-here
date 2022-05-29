<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        DB::table('categorias')->insert([
            'nome' => 'Relacionamentos',
        ]);
        DB::table('categorias')->insert([
            'nome' => 'Familia',
        ]);
        DB::table('categorias')->insert([
            'nome' => 'Empresa',
        ]);
    }
}
