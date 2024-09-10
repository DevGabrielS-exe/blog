@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ URL('/postagem') }}">

                        @csrf

                        <div class="form-group">
                            <br>
                            <label for="cars">Choose a car:</label>

                            <select name="categoria_id" id="cars" class="form-control">
                                @foreach ($categorias as $value)
                                <option value="{{$value->id}}">{{$value->nome}}</option>
                                @endforeach
                            </select>
                            <br>
                            <label for="exampleInputEmail1">Título</label>
                            <input type="text" name="titulo" class="form-control"
                                placeholder="Digite o título da postagem">

                            <label for="exampleInputEmail1">Conteúdo</label>
                            <textarea name="conteudo" class="form-control" id="conteudo" cols="50" rows="4"
                                placeholder="Digite o conteúdo da postagem"></textarea>
                        </div>

                        <input type="submit" value="Enviar">
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
