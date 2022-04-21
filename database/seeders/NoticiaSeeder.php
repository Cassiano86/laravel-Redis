<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NoticiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Setando o limite de megas suportado pelo PHP
        ini_set("memory_limit", "512M");

        //O Valor adicionado dentro do factory diz a quantidade de registros que queremos criar
        \App\Models\Noticia::factory(1000)->create();
    }
}
