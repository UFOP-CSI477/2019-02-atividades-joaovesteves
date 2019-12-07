@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
<form>
    <div>
        <select class="form-control">
            <option>1</option>
            <option>2</option>
            <option>3</option>
    </div>

    <div>
        <input type="date" name="date" id="date">
    </div>

    <div>
        <input type="text" name="descricao" id="descricao">
    </div>
    
</form>
@stop
