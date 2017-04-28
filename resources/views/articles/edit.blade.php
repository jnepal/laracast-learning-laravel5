@extends('layout')

@section('content')
    <h1>Edit: {{ $article->title }}</h1>
    <!-- 'action' => {'ArticlesController@update', $article->id] could be Replaced by 'url' => 'articles/'.$article->id -->
    {!! Form::model($article,['method' => 'PATCH', 'action' => ['ArticlesController@update', $article->id]]) !!}
        @include('articles._form', ['submitButtonText' => 'Update Article']);
    {!! Form::close() !!}
    
    @include('errors.list')
@stop