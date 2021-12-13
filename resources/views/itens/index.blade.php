@extends('itens.layout')
 
@section('content')
    <div class="row" style="padding: 20px 0;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lista de compras</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('itens.create') }}">Adicionar novo item</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Número</th>
            <th>Nome</th>
            <th width="300px">Ação</th>
        </tr>
        @foreach ($itens as $item)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $item->name }}</td>
            <td style="display: flex;">
                <a class="btn btn-primary" href="{{ route('itens.edit',$item->id) }}" style="margin-right: 5px">Editar</a>
                <form action="{{ route('itens.destroy',$item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $itens->links() !!}
      
@endsection