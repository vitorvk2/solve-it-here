<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        DB::table('chats')->insert([
            'titulo' => 'Primeiro Teste',
            'descricao' => 'Olá, amigo! Estou com dúvidas sobre o objeto.',
            'categoria_id' => '1',
            'user_id' => '1'
        ]);
        DB::table('chats')->insert([
            'titulo' => 'Segundo Teste',
            'descricao' => 'Olá, amigo! Estou com dúvidas sobre o objeto.',
            'categoria_id' => '2',
            'user_id' => '1'
        ]);
        DB::table('chats')->insert([
            'titulo' => 'Terceiro Teste',
            'descricao' => 'Olá, amigo! Estou com dúvidas sobre o objeto.',
            'categoria_id' => '3',
            'user_id' => '1'
        ]);
    }
}
