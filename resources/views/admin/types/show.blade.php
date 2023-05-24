@extends('layouts/admin')

@section('content')
    <ul>
        
        <li>
           Nome: {{$type->name}}
        </li>
        
        <li>
            Slug: {{$type->slug}}
        </li>
        <li>
            Descrizione: {{$type->description}}
        </li>
       
        

       
    </ul>
<a href="{{route('admin.types.index')}}"><button class="btn btn-primary">Torna alla lista dei types</button></a>
    
@endsection