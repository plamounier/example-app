@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">Visualizar Produtos</h1>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="col-8 m-auto">

                        <form>
                            <fieldset disabled>
                              <div class="form-group">
                                <label for="disabledTextInput"><strong>Nome do Produto:</strong></label>
                                <input type="text" id="disabledTextInput" class="form-control" placeholder="{{$produto->name}}">
                                <br>
                            </div>
                              <div class="form-group ">
                                <label for="disabledTextInput"><strong> Tags do Produto: </strong></label>
                                <br>
                                @foreach ($produto->tag as $key=>$item)
                                <input type="text" id="disabledTextInput" class="form-control-sm shadow-lg bg-white rounded" placeholder="{{$item->name}}">
                                    @endforeach
                              </div>
                              <br>
                              <a href="{{ URL::previous() }}"><button type="submit" class="btn btn-primary">Voltar</button></a>
                            </fieldset>
                          </form>

                    </div>
            
        </div>
    </div>
</div>
@endsection
