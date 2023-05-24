@extends('layouts/admin')

@section('content')
<div class="container">
  <h1>Modifica Type</h1>

  <form action="{{route('admin.types.update', $type)}}" method="POST" class="py-5">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="name">Nome</label>
      <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{old('name') ?? $type->name}}">
      @error('name')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="description">Descrizione progetto</label>
      <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description"  value="{{old('description') ?? $type->description}}">
      @error('description')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    


    <button type="submit" class="btn btn-primary">Modifica</button>

  </form>

</div>

@endsection