@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">Editar Produto</h1>
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
                    
                    <form name="formEdit" id="formEdit" method="POST" action="{{url("products/$produto->id")}}">
                        @method('PUT')
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
                                    @foreach (old('tags', $produto->tag->count() ? $produto->tag : ['']) as $produto_tag)
                                        <tr id="tags{{ $loop->index }}">
                                            <td>
                                                <select name="tags[]" class="form-control">
                                                    <option value="">-- Selecionar Tag --</option>
                                                    @foreach($tags as $tag)
                                                        <option value="{{ $tag->id }}"
                                                            @if (old('tags.' . $loop->parent->index, optional($produto_tag)->id) == $tag->id) selected @endif))
                                                        > {{$tag->name}} 
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr id="tag{{ count(old('tags', $produto->tag->count() ? $produto->tag : [''])) }}"></tr>  
                                </tbody>
                            </table>

                            <div class="row">
                                <div class="col-md-12">
                                    <button id="add_row" class="btn btn-secondary pull-left">+ Adicionar Tag</button>
                                    <button id='delete_row' class="pull-right btn btn-danger">- Deletar Tag</button>
                                </div>
                            </div>
                            <br>
                            <input class="btn btn-success" type="submit" value="Editar">
                            <a href="{{ URL::previous() }}"><button type="submit" class="btn btn-primary">Voltar</button></a>
                
                        </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
      $(document).ready(function(){
        let row_number = {{ count(old('tags', $produto->tag->count() ? $produto->tag : [''])) }};
        $("#add_row").click(function(e){
          e.preventDefault();
          let new_row_number = row_number - 1;
          $('#tag' + row_number).html($('#tag' + new_row_number).html()).find('td:first-child');
          $('#tags_table').append('<tr id="tag' + (row_number + 1) + '"></tr>');
          row_number++;
        });
        $("#delete_row").click(function(e){
          e.preventDefault();
          if(row_number > 1){
            $("#tag" + (row_number - 1)).html('');
            row_number--;
          }
        });
      });
    </script>
@endsection
