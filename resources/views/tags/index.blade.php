@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">Listagem de Tags</h1>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="mt-3 mb-4">
                        <a href="{{url("tags/create")}}">
                            <button class="btn btn-success btn-sm">Cadastrar</button>
                        </a>
                    </div>
                    @csrf
                    <table class="table text-center" >
                        <thead class="table-secondary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome da Tag</th>
                                <th scope="col">Ações</th>
                              </tr>
                        </thead>
                        <tbody>
                            @foreach ($listatags as $tag)
                                <tr>
                                    <th scope="row">{{$tag->id}}</th>
                                    <td>{{$tag->name}}</td>
                                    <td>
                                        <a href="{{url("tags/$tag->id")}}">
                                            <button class="btn btn-secondary btn-sm">Visualizar</button>
                                        </a>
                                        <a href="{{url("tags/$tag->id/edit")}}">
                                            <button class="btn btn-primary btn-sm">Editar</button>
                                        </a>
                                        <a href="{{url("tags/$tag->id")}}" class="js-del">
                                            <button class="btn btn-danger btn-sm">Deletar</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                      {{$listatags->links()}} 
        </div>
    </div>
</div>
@endsection
