
@extends('adminlte::page')

@section('title', 'Libros')

@section('content_header')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Libros</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item" ><a href="{{route('book.index')}}">Libros</a></li>
                    <li class="breadcrumb-item active">Editar</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
    @if($message = Session::get('success'))
        <x-adminlte-alert theme="success" title="Exito" dismissable>
            {{$message}}
        </x-adminlte-alert>
    @endif
    @if($message = Session::get('error'))
        <x-adminlte-alert theme="danger" title="Error" dismissable> 
            {{$message}}
        </x-adminlte-alert>
    @endif
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Editar Libro</h3>
    </div>
    <form action="{{ route('book.update', ['id' => $book->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            {{-- Name field --}}
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                               value="{{ $book->title }}" placeholder="{{ __('Título') }}" required="required"autofocus>
            
                        <div class="input-group-append">
                            <div class="input-group-text bg-primary">
                                <span class="fas fa-book {{ config('adminlte.classes_auth_icon', '') }}"></span>
                            </div>
                        </div>
            
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <input type="text" name="author" class="form-control @error('author') is-invalid @enderror"
                               value="{{ $book->author }}" placeholder="{{ __('Autor') }}" required="required"autofocus>
            
                        <div class="input-group-append">
                            <div class="input-group-text bg-primary">
                                <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                            </div>
                        </div>
            
                        @error('author')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <input type="text" name="editorial" class="form-control @error('editorial') is-invalid @enderror"
                               value="{{ $book->editorial }}" placeholder="{{ __('Editorial') }}" required="required"autofocus>
        
                        <div class="input-group-append">
                            <div class="input-group-text bg-primary">
                                <span class="fas fa-audio-description {{ config('adminlte.classes_auth_icon', '') }}"></span>
                            </div>
                        </div>
            
                        @error('editorial')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-group mb-3">

                        <input type="date" name="publication_year" class="form-control @error('publication_year') is-invalid @enderror"
                        value="{{ $book->publication_year }}" placeholder="{{ __('Fecha de publicacion') }}" required="required"autofocus">
                        
                        <div class="input-group-append">
                            <div class="input-group-text bg-primary">
                                <span class="fas fa-calendar {{ config('adminlte.classes_auth_icon', '') }}"></span>
                            </div>
                        </div>
                        
                        @error('publication_year')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <input type="text" name="genre" class="form-control @error('genre') is-invalid @enderror"
                               value="{{ $book->genre }}" placeholder="{{ __('Genero') }}">
            
                        <div class="input-group-append">
                            <div class="input-group-text bg-primary">
                                <span class="fas fa-clipboard-list {{ config('adminlte.classes_auth_icon', '') }}"></span>
                            </div>
                        </div>
            
                        @error('genre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    {{-- With prepend slot, label and data-placeholder config --}}
                    <x-adminlte-select2 name="shelf_id" label-class="text-lightblue" igroup-size="lg" data-placeholder="Estanteria">
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-primary">
                                <i class="fas fa-border-all"></i>
                            </div>
                        </x-slot>
                        <option>Seleccione Estanteria</option>
                        @foreach ($shelfs as $shelf)
                            <option value="{{$shelf->id}}"@if($book->shelf_id == $shelf->id || old('shelf_id') == $shelf->id) selected @endif>{{$shelf->name}}</option>
                        @endforeach
                    </x-adminlte-select2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <x-adminlte-textarea name="decription" label="Descripcion" rows=5  igroup-size="sm" placeholder="Inserte descripcion">{{ $book->decription }}
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-primary">
                                <i class="fas fa-lg fa-file-alt text-white"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-textarea>
                </div>
            </div>
            <div class="row">
                <label for="img">Imagen</label>
                <div class="row justify-content-center w-100">
                    <img id="imgPreview" width="100" height="100" src="{{asset($book->img)}}"/>
                    <input type="hidden" name="old_img" value="{{$book->img}}">
                    <div class="input-group mb-3">
                        <input type="file" name="img" id="img" class="form-control" accept="image/png,image/jpeg">
                        <div class="input-group-append">
                            <div class="input-group-text bg-primary">
                                <span class="fas fa-file-image {{ config('adminlte.classes_auth_icon', '') }}"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Register button --}}
        <div class="card-footer">
            <div class="card-tools">
                <button type="submit" class="btn btn-success {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                    <span class="fas fa-save"></span> Guardar
                </button>
            </div>
        </div>
    </form>
</div>
@stop

@section('js')
<script>

    document.addEventListener('change', function (event) {
        //Recuperamos el input que desencadeno la acción
        const input = event.target;
        if(input.closest('input[type="file"]'))
        {            
                //Recuperamos la etiqueta img donde cargaremos la imagen
                $imgPreview = document.querySelector("img#imgPreview");
            
                // Verificamos si existe una imagen seleccionada
                if(!input.files.length) return
            
                //Recuperamos el archivo subido
                file = input.files[0];
            
                //Creamos la url
                objectURL = URL.createObjectURL(file);
            
                //Modificamos el atributo src de la etiqueta img
                $imgPreview.src = objectURL;
        }
    });

                    
</script>
@stop
