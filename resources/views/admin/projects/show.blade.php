@extends('layouts/admin')

@section('content')
<div class="container">

  <div class="text-center">
    <img src="{{ asset('storage/' . $project->thumb_preview) }}" alt="prova" class="w-50">
  </div>
  <ul> 
          <li>
             Nome: {{$project->name}}
          </li>
          <li>
           type: {{$project->type?->name}}
         </li>
         <li>
  
           <div class="d-flex py-3">
            @foreach($project->technologies as $item)
              <span class="badge rounded-pill mx-1" style="background-color: {{$item->color}}">{{$item->name}}</span>
            @endforeach
           </div>
         </li>
          <li>
             Thumb preview: <br> <img src="{{$project->thumb_preview}}" alt=""> 
          </li>
          <li>
              Descrizione: {{$project->description}}
          </li>
          <li>
             Link repo: {{$project->link_repo}}
          </li>
          
  
         
      </ul>
      <a href="{{route('admin.projects.index')}}"><button class="btn btn-primary">Torna alla lista dei progetti</button></a>
</div>    
    
@endsection