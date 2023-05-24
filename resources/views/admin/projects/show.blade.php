@extends('layouts/admin')

@section('content')
    <ul>
        
        <li>
           Nome: {{$project->name}}
        </li>
        <li>type: {{$project->type?->name}}</li>
        <li>
           Thumb preview: <br> <img src="{{$project->thumb_preview}}" alt=""> 
        </li>
        <li>
            Descrizione: {{$project->description}}
        </li>
        <li>
           Link repo: {{$project->link_repo}}
        </li>
        <li>
           Linguaggi utilizzati {{$project->languages}}
        </li>
        <li>
           Frameworks utilizzati: {{$project->frameworks}}
        </li>
        

       
    </ul>
<a href="{{route('admin.projects.index')}}"><button class="btn btn-primary">Torna alla lista dei progetti</button></a>
    
@endsection