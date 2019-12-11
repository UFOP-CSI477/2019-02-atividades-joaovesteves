@extends('menu')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Prática II</h1>
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
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">Área do Usuário</p>
                </div>
            </div>
        </div>
    </div>
@stop
