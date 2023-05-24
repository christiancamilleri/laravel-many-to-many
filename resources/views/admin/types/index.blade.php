@extends('layouts/admin')

@section('content')
    
<div class="container py-3">

    <table class="table table-striped table-dark table-hover">
      <thead class="text-bg-danger">
        <th>
          Nome
        </th>
        <th>
          slug
        </th>
        <th>
          Descrizione
        </th>
      
    
      <tbody>

      @foreach ($types as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td><img src="{{$item->slug}}"></img></td>
            <td>{{$item->description}}</td>
            
            <td><a href="{{route('admin.types.show', $item->slug)}}">Apri</a></td>
            <td><a href="{{route('admin.types.edit', $item)}}">Modifica</a></td>
            
            <td> 
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Elimina 
              </button>

              
            </td>
          <td>
          </td>
        </tr>    
      @endforeach
  
    </tbody>

  </table>
  <a class="btn btn-primary" href="{{route('admin.types.create')}}">Aggiungi un type</a>

  
</div>

<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content text-bg-dark">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina Type</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Sei sicuro di voler eliminare questo Type? L'azione è irreversibile
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
        <form action="{{route('admin.types.destroy',$item)}}" method="POST">
          @csrf
          @method('DELETE')

          <button type="submit" class="btn btn-danger my-create delete-btn">Elimina </button>
          </form>
        
      </div>
    </div>
  </div>
</div>


@endsection
