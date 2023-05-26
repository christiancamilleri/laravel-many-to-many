@extends('layouts/admin')

@section('content')
<div class="container">
  <h1>Modifica il Progetto</h1>

  <form action="{{route('admin.projects.update', $project)}}" method="POST" class="py-5" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="name">Nome progetto</label>
      <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{old('name') ?? $project->name}}">
      @error('name')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="thumb_preview">img</label>
      <input class="form-control @error('thumb_preview') is-invalid @enderror" type="file" name="thumb_preview" id="thumb_preview">
      @error('thumb_preview')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="type_id">Types</label>
      <select name="type_id" id="type_id" class="form-select @error('type_id') is-invalid @enderror">

        <option value="">Nessuna</option>

        @foreach ($types as $item)
            <option value="{{$item->id}}" {{$item->id == old('type_id', $project->type_id) ? 'selected' : ''}}>{{$item->name}}</option>
        @endforeach

      </select>
      @error('type_id')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="mb-3 form-group">
      <h3>Linguaggi utilizzati</h3>

      @foreach($technologies as $item)
      <div class="form-check">
        <input type="checkbox" id="technology-{{$item->id}}" name="technologies[]" value="{{$item->id}}" @checked($project->technologies->contains($item))>
        <label for="technology-{{$item->id}}">{{$item->name}}</label>
      </div>
      @endforeach

    </div>

  
    <div class="mb-3">
      <label for="description">Descrizione progetto</label>
      <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description"  value="{{old('description') ?? $project->description}}">
      @error('description')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="link_repo">Link repository</label>
      <input class="form-control @error('link_repo') is-invalid @enderror" type="text" name="link_repo" id="link_repo"  value="{{old('link_repo') ?? $project->link_repo}}">
      @error('link_repo')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>



    <button type="submit" class="btn btn-primary">Modifica</button>

  </form>

</div>

@endsection