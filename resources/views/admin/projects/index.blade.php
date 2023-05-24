@extends('layouts/admin')

@section('content')
    
<div class="container py-3">

    <table class="table table-striped table-dark table-hover">
      <thead class="text-bg-danger">
        <th>
          Nome progetto
        </th>
        <th>
          Link preview
        </th>
        <th>
          Descrizione
        </th>
        <th>
          Link repository
        </th>
        <th>
          Type
        </th>
        <th></th>
        <th></th>
      </thead>
    
      <tbody>

      @foreach ($projects as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td><img src="{{$item->thumb_preview}}"></img></td>
            <td>{{$item->description}}</td>
            <td><a href="">{{$item->link_repo}}</a></td>
            <td>{{$item->type?->name}}</td>
            <td><a href="{{route('admin.projects.show', $item)}}">Apri</a></td>
            <td><a href="{{route('admin.projects.edit', $item)}}">Modifica</a></td>
            
            <td> 
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Elimina Progetto
              </button>

              
            </td>
          <td>
          </td>
        </tr>    
      @endforeach
  
    </tbody>

  </table>
  
</div>

 <!-- Modal -->
 <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content text-bg-dark">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina progetto?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Sei sicuro di voler eliminare questo progetto? L'azione è irreversibile
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
        <form action="{{route('admin.projects.destroy', $item)}}" method="POST">
          @csrf
          @method('DELETE')

          <button type="submit" class="btn btn-danger my-create delete-btn">Elimina </button>
          </form>
        
      </div>
    </div>
  </div>
</div>

<hr class="mb-5">

<div class="container text-center py-5">
  <a class="btn btn-primary" href="{{route('admin.projects.create')}}">Aggiungi un progetto</a>
  <a class="btn btn-primary" href="{{route('admin.types.index')}}">Visualizza i types</a>

</div>

@endsection