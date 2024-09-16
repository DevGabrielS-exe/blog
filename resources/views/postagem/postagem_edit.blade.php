@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                    @endif

                    <form method="POST" action="{{ URL('/postagem/' . $postagem->id) }}">
                        @method('PUT')
                        @csrf

                        <label for="cars">Categoria:</label>
                        <select name="categoria_id" id="cars" class="form-control">
                            @foreach ($categorias as $value)

                            @if ($value->id == $postagem->categoria_id)
                            <option selected="selected" value="{{ $value->id }}">{{ $value->nome }}</option>
                            @else

                            <option value="{{ $value->id }}">{{ $value->nome }}</option>
                            @endif

                            @endforeach
                        </select>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Título</label>
                            <input type="text" name="titulo" value="{{ $postagem->titulo }}" class="form-control" placeholder="Digite o título da postagem">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Conteudo</label>
                            <textarea name="conteudo" class="form-control" id="conteudo" cols="50" rows="4"
                                placeholder="Digite o conteúdo da postagem"> {{$postagem->conteudo}}</textarea>
                        </div>

                        <input type="submit" value="Enviar">
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
