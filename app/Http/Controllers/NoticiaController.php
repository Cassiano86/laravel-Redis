<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoticiaRequest;
use App\Http\Requests\UpdateNoticiaRequest;
use App\Models\Noticia;
use Illuminate\Support\Facades\Cache;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        /* 
            A classe cache do db Redis será formada por 3 parâmetros
            1° O nome da chave
            2° O valor que será passado para essa chave
            3° Tempo em segundos que esse valor será contido em memória
         */
        //Cache::put("noticias", $noticias, 10);

        //Recuperando um dado dentro do db Redis, será necessário apenas o valor da chave
        //Cache::get($noticias);

        //O método Cache::has('chave') indica se há ou não uma consulta armazenada em cache

        /* $noticias = Noticia::orderByDesc("created_at")->limit(10)->get(); */

        /* 
        
        //Verificando se há uma consulta armazenada em Cache
        if(Cache::has('noticias')){
            $noticias = Cache::get("noticias"); //Apenas recupera o valor
        }else{
            //Caso não haja nenhum valor, então faremos uma consulta no banco de dados e utilizaremos o método PUT para armazenar o valor em cache
            $noticias = Noticia::orderByDesc("created_at")->limit(10)->get();
            Cache::put("noticias", $noticias, 10);
        } 
        
        */

        /* Criando um método mais enxuto do Redis para verificação de existência de cache */
        $noticias = [];
        $noticias = $this->verificarCache();

        return view('noticias', compact(["noticias"]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNoticiaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNoticiaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $noticia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit(Noticia $noticia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNoticiaRequest  $request
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNoticiaRequest $request, Noticia $noticia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticia $noticia)
    {
        //
    }

    private function verificarCache(){
        return Cache::remember("noticias", 10, function(){
                    return Noticia::orderByDesc("created_at")->get();
                });
    }
}
