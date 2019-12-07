@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Registrar Requisição</h1>
@stop

@section('itensMenu')
<li class="nav-header">OPÇÕES</li>
<li class="nav-item ">
    <a class="nav-link " href="http://localhost:8000/home/protocolos">
        <i class="fas fa-fw fa-book-open "></i>
        <p>Protocolos</p>
    </a>
</li>
<li class="nav-item ">
    <a class="nav-link " href="http://localhost:8000/home/registro">
        <i class="fas fa-fw fa-edit "></i>
        <p>Registrar Requisição</p>                                            
    </a>
</li>
@stop

@section('content')
<form action="{!! action('UsuarioController@store') !!}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="protocolo">Protocolos:</label>
            <select name="protocolo" id="protocolo" class="form-control" required>
                @foreach ($subjects as $subject)
                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="date">Data:</label>
            <input type="date" name="date" id="date" class="form-control"
            required>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea class="form-control" rows="5" id="descricao" name="descricao" placeholder="Descrição" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>
@stop
