@extends('adminlte::page')

@section('title', 'Crear un nuevo posts')

@section('content_header')
    <h1>Nuevo post</h1>
@stop

@section('content')
   <div class="card">
    <div class="card-body">
        {{-- {!! Form::open(['route' => 'Admin.Publicaciones','autocomplete' => 'off']) !!} --}}

        <div class="form-group">
            {!! Form::label('name', 'Nombre:', ) !!}
            {!! Form::text('name', null, ['class' => 'form-control','class' =>'basic-usage', 'placeholder' => 'Ingrese el nombre del post']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('slug', 'Slug:', ) !!}
            {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug del post', 'readonly']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('category_id', 'Categoría', ) !!}
            {!! Form::text('category_id', $category, null,  ['class' => 'form-control']) !!}
        </div>
{{-- 
        <div class="form-group">
            <p class="font-weight-bold">Etiquetas</p>

            @foreach ($tags as $tag)
                <label class="mr-2">
                    {!! Form::checkbox('tags[]', $tag->id, null) !!}
                    {{ $tag->name }}
                </label>
        </div>
        @endforeach --}}



        <div class="form-group">
            {!! Form::label('extract', 'Extracto:', ) !!}
            {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('body', 'Cuerpo del post:', ) !!}
            {!! Form::textarea('body',null, ['class' => 'form-control-file']) !!}
        </div>

        {!! Form::submit('Crear el post', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
   </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="./bower_components/jquery.stringtoslug/dist/jquery.stringtoslug.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $("#name").stringToSlug();
    });

     ClassicEditor
        .create( document.querySelector( '#extract' ) )
        .catch( error => {
            console.error( error );
        } );

         ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@stop






