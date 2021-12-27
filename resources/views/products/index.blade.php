@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">Listagem de Produtos</h1>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="mt-3 mb-4">
                        <a href="{{url("products/create")}}">
                            <button type="button" class="btn btn-success btn-sm">Cadastrar</button>
                        </a>
                        <a href="{{url("pdf")}}">
                            <button type="button" class="btn btn-dark btn-sm">PDF</button>
                        </a>
                    </div>
                    @csrf
                    <table class="table text-center" >
                        <thead class="table-secondary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome do Produto</th>
                                <th scope="col">Tags</th>
                                <th scope="col">Ações</th>
                              </tr>
                        </thead>
                        <tbody>
                            @foreach ($listaprodutos as $produto)
                                <tr>
                                    <th scope="row">{{$produto->id}}</th>
                                    <td>{{$produto->name}}</td>
                                    <td>
                                        <ul>
                                            @foreach($produto->tag as $key => $item)
                                                <li>{{ $item->name }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <a href="{{url("products/$produto->id")}}">
                                            <button class="btn btn-secondary btn-sm">Visualizar</button>
                                        </a>
                                        <a href="{{url("products/$produto->id/edit")}}">
                                            <button class="btn btn-primary btn-sm">Editar</button>
                                        </a>
                                        <a href="{{url("products/$produto->id")}}" class="js-del">
                                            <button class="btn btn-danger btn-sm">Deletar</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                    {{$listaprodutos->links()}} 
        </div>
        
    </div>
   
</div>
@endsection
