<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RespostaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        DB::table('respostas')->insert([
            'resposta' => 'Então, cara! Verdade.', 
            'chat_id' => '1',
            'user_id' => '1'
        ]);
        DB::table('respostas')->insert([
            'resposta' => 'Nossa, como assim?', 
            'chat_id' => '1',
            'user_id' => '1'
        ]);
        DB::table('respostas')->insert([
            'resposta' => 'Eu realmente entendo, por esse motivo', 
            'chat_id' => '2',
            'user_id' => '1'
        ]);
        DB::table('respostas')->insert([
            'resposta' => 'Você precisa fazer algo', 
            'chat_id' => '2',
            'user_id' => '1'
        ]);
        DB::table('respostas')->insert([
            'resposta' => 'WTFFF', 
            'chat_id' => '3',
            'user_id' => '1'
        ]);
    }
}
