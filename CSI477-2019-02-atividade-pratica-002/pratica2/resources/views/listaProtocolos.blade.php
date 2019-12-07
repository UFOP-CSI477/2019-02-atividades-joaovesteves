@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Lista de Protocolos</h1>
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
    <table class="table">
        <thead class="thead-dark">
            <tr>
              <th scope="col">Protocolo</th>
              <th scope="col">Preço</th>
              <th scope="col">Editar</th>
              <th scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $subject)
                <tr>
                    <td>{{$subject->name}}</td>
                    <td>{{$subject->price}}</td>
                    <td>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete{{$subject->id}}">Excluir</button>
                            <div class="modal fade" id="modalDelete{{$subject->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="deleteLabel">Protocolo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                        <div class="modal-body">
                                            Deseja realmente excluir esse protocolo!?
                                        </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                                    <form action="{{ route('protocolos.destroy', $subject) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                    </form>
                                </div>
                            </div>
                                </div>
                            </div>
                    </td>
                        
                    <td>
                       <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editar{{$subject -> id}}">Editar</button>
                        <div class="modal fade" id="editar{{$subject -> id}}" tabindex="-1" role="dialog" aria-labelledby="TituloModalLongoExemplo" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form method="post" action="{{route('protocolos.update', $subject)}}">
                                    {{csrf_field()}}
                                    @method('put')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="TituloModalLongoExemplo">Editar</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div> 
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="newProtocolo">Nome do protocolo:</label>
                                                <input type="text" name="newProtocolo" id="newProtocolo" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="preco">Preço:</label>
                                                <input type="number" name="preco" id="preco" class="form-control">
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                                            <button type="submit" class="btn btn-primary">Editar mudanças</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div> 
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
