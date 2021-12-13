@extends('itens.layout')
  
@section('content')
<div class="row" style="padding: 20px 0;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Adicionar Item</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('itens.index') }}">Voltar</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('itens.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong>
                <input type="text" name="name" class="form-control" placeholder="Nome do item">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Adicionar</button>
        </div>
    </div>
   
</form>
@endsection