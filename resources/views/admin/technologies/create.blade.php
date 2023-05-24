@extends('layouts/admin')

@section('content')
<div class="container">
  <h1>Aggiungi un Linguaggio</h1>

  <form action="{{route('admin.technologies.store')}}" method="POST" class="py-5">
    @csrf

    <div class="mb-3">
      <label for="name">Nome Linguaggio</label>
      <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{old('name')}}">
      @error('name')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>


      
    <button type="submit" class="btn btn-primary">Aggiungi</button>

  </form>

</div>

@endsection