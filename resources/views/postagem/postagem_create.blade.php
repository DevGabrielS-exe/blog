@extends('adminlte::page')

@section('content')

    <link rel="stylesheet" href="{{ url('/richtexteditor/rte_theme_default.css') }}" />
    <script type="text/javascript" src="{{ url('/richtexteditor/rte.js') }}"></script>
    <script type="text/javascript" src='{{ url('/richtexteditor/plugins/all_plugins.js') }}'></script>

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

                    <form method="POST" action="{{ URL('/postagem') }}" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                            <br>
                            <label for="cars">Categoria:</label>
                            <select name="categoria_id" id="cars" class="form-control">
                                @foreach ($categorias as $value)
                                    <option value="{{ $value->id }}">{{ $value->nome }}</option>
                                @endforeach
                            </select>

                            <br>
                            <label>Imagem</label>
                            <input type="file" name="imagem" class="form-control">

                            <br>
                            <label for="exampleInputEmail1">Título</label>
                            <input type="text" name="titulo" class="form-control"
                                placeholder="Digite o título da postagem">

                            <label for="exampleInputEmail1">Conteúdo</label>

                            <textarea id="inp_editor1" name="conteudo" class="form-control" cols="50" rows="4"></textarea>
                        </div>

                        <input type="submit" value="Enviar">
                    </form>

                    <script>
                        var editor1 = new RichTextEditor("#inp_editor1");
                    </script>

                </div>
            </div>
        </div>
    </div>
@endsection
