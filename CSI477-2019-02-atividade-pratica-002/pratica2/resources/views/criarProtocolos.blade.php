@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Registrar Protocolo</h1>
@stop

@section('itensMenu')
<li class="nav-header">OPÇÕES</li>
<li class="nav-item ">
    <a class="nav-link " href="http://localhost:8000/admin/lista">
        <i class="fas fa-fw fa-book-open "></i>
        <p>Protocolos</p>
    </a>
</li>
<li class="nav-item ">
    <a class="nav-link " href="http://localhost:8000/admin/cria">
        <i class="fas fa-fw fa-edit "></i>
        <p>Registrar Protocolo</p>                                            
    </a>
</li>
@stop

@section('content')
<form action="{!! action('AdminController@store') !!}" method="post">
    @csrf
    <div class="form-group">
        <label name="name">Nome do Protocolo<span class="text-danger"></span></label>
        <input name="newProtocolo" type="text" id="newProtocolo" class="form-control" placeholder="Insira o nome do protocolo" required>
    </div>

    <div class="form-group">
    <label name="price">Preço:<span class="text-danger"></span></label>
    <input name="preco" type="number" id="preco" class="form-control" placeholder="Insira um preço" required>
    </div>

    <div class="form-group">
    <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary">Criar</button>
    </div>
</form>
@stop
