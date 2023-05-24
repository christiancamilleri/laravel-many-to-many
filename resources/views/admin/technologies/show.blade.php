@extends('layouts/admin')

@section('content')
    <ul>
        
        <li>
           Nome: {{$technology->name}}
        </li>
        <li>
         slug: {{$technology->slug}}
       </li>

        <li>
           Color: {{$technology->color}} 
        </li>
        

       
    </ul>
<a href="{{route('admin.technologies.index')}}"><button class="btn btn-primary">Torna alla lista dei linguaggi</button></a>
    
@endsection