@extends('itens.layout')
 
@section('content')
    <div class="row">
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
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($itens as $item)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $item->name }}</td>
            <td>
                <form action="{{ route('itens.destroy',$item->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('itens.show',$item->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('itens.edit',$item->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $itens->links() !!}
      
@endsection