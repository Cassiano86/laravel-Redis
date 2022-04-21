@extends('layouts.app')

@section("content")
    <div class="table-responsive">
        <table class="table table-highlight text-center">
            <thead class="thead-dark">
                <th scope='col'>Id</th>
                <th scope='col'>Titulo</th>
                <th scope='col'>Descrição</th>
            </thead>
            <tbody>
                @forelse($noticias as $noticia)
                    <tr>
                        <td>{{$noticia->id}}</td>
                        <td>{{$noticia->titulo}}</td>
                        <td>{{$noticia->noticia}}</td>
                    </tr>
                @empty
                    <td colspan='4'>Nenhuma permissão cadastrado</td>
                @endforelse
            </tbody>   
        </table>
    </div>
@endsection