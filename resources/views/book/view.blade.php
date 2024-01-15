@php
    use Carbon\Carbon;
    $date = Carbon::parse($book->publication_year);
    $date = $date->format('d-m-Y');
@endphp
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <strong>Título: </strong> <p>{{$book->title}}</p> 
            <strong>Autor: </strong> <p>{{$book->author}}</p> 
            <strong>Editorial: </strong> <p>{{$book->editorial}}</p>  
        </div>
        <div class="col-md-5" style="max-width: 10rem; max-height: 10rem;">
            <img src="{{asset($book->img)}}" alt="{{$book->name}}" style="width: 100%;height: 100%;">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-3">
            <strong>Año de publicacion: </strong> <p>{{$date}}</p> 
        </div>
        <div class="col-lg-4 col-md-3">
            <strong>Estanteria: </strong> <p>{{$book->shelf}}</p> 
        </div>
        <div class="col-lg-4 col-md-3">
            <strong>Genero: </strong> <p>{{$book->genre}}</p> 
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <strong>Descripcion: </strong> <p>{{$book->decription}}</p> 
        </div>
    </div>
</div>
