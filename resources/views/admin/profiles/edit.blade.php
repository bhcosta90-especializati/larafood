@extends('adminlte::page')

@section('title', 'Editar perfil')

@section('content_header')
    {{ Breadcrumbs::render('admin.profiles.edit', $form->getModel()->id, $form->getModel()->name) }}
    <hr />
    <h1>Editar perfil</h1>
@stop

@section('content')
    <div class='card'>
        <div class='card-body'>
            {!! form($form) !!}
        </div>
    </div>
@stop
