@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">Cadastro de Produtos</h1>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(@isset($errors) && count($errors)>0)
                        <div class="text-center mt-4 mb-4 p-2 alert-danger">
                            @foreach ($errors->all() as $erro)
                                {{$erro}}
                            @endforeach
                        </div>
                    @endif
                    
                    <form name="formCad" id="formCad" method="POST" action="{{url("products")}}">
                            @csrf 
                            <strong>Nome do Produto:</strong>
                            <input class="form-control" type="text" name="name" id="name" max="50" placeholder="Produto: " value="{{$produto->name ?? ''}}" required><br>
                            <table class="table" id="tags_table">
                                <thead>
                                    <tr>
                                        <th>Tags</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (old('tags', ['']) as $index => $oldTag)
                                        <tr id="tags{{ $index }}">
                                            <td>
                                                <select name="tags[]" class="form-control">
                                                    <option value="">-- Selecionar Tag --</option>
                                                    @foreach($tags as $tag)
                                                        <option value="{{ $tag->id }}"
                                                            {{ $oldTag == $tag->id ? ' selected' : '' }}
                                                        > {{$tag->name}} 
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr id="product{{ count(old('products', [''])) }}"></tr>    
                                </tbody>
                            </table>

                            <input class="btn btn-success" type="submit" value="Cadastrar">
                            <a href="{{ URL::previous() }}"><button type="submit" class="btn btn-primary">Voltar</button></a>
                        </form>
            
            
        </div>
    </div>
</div>
@endsection
