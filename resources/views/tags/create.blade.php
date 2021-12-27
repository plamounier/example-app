@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">Cadastro de Tags</h1>
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

                    @if(isset($tag))
                        <form name="formEdit" id="formEdit" method="POST" action="{{url("tags/$tag->id")}}">
                            @method('PUT')
                        @else
                        <form name="formCad" id="formCad" method="POST" action="{{url("tags")}}">
                    @endif

                    @csrf 
                    <input class="form-control" type="text" name="name" id="name" max="50" placeholder="Nome da Tag: " value="{{$tag->name ?? ''}}" required><br>
                    <input class="btn btn-success" type="submit" value="@if(isset($tag->id)) Editar @else Cadastrar @endif">
                    <a href="{{ URL::previous() }}"><button type="submit" class="btn btn-primary">Voltar</button></a>
                </form>

            
            
        </div>
    </div>
</div>
@endsection
