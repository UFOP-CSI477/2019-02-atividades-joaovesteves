@extends('menu')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Protocolos</h1>
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
    <table class="table">
        <thead class="thead-dark">
            <tr>
              <th scope="col">Protocolo</th>
              <th scope="col">Data</th>
              <th scope="col">Descrição</th>
              <th scope="col">Excluir</th>
              <th scope="col">Editar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requests as $request)
                <tr>
                    <td>{{$request -> name}}</td>
                    <td>{{$request -> date}}</td>
                    <td>{{$request -> description}}</td>
                    <td>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete{{$request->id}}">Excluir</button>
                            <div class="modal fade" id="modalDelete{{$request->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="deleteLabel">Requisicao</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                        <div class="modal-body">
                                            Deseja realmente excluir essa requisição?
                                        </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                                    <form action="{{ route('requerir.destroy', $request) }}" method="post">
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
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editar{{$request -> id}}">Editar</button>
                        <div class="modal fade" id="editar{{$request -> id}}" tabindex="-1" role="dialog" aria-labelledby="TituloModalLongoExemplo" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form method="post" action="{{route('requerir.update', $request)}}">
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
                                                <label for="protocolo">Protocolos:</label>
                                                <select value="{{$request->subjectid}}"name="protocolo" id="protocolo" class="form-control" required>
                                                @foreach ($subjects as $subject)
                                                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                                                @endforeach
                                            </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="date">Data:</label>
                                                <input type="date" name="date" id="date" class="form-control" value="{{$request -> date}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="descricao">Descrição:</label>
                                                <textarea class="form-control" rows="5" id="descricao" name="descricao" placeholder="Descrição" required>{{$request -> description}}</textarea>
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
