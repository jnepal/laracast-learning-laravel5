@extends('layout')

@section('content')
    <h1>Articles</h1>
    <hr>
    @foreach($articles as $article)
        <article>
            <h2>
                <!-- Can be also done by href="{action('ArticlesController@show', [$article->id])}"-->
                <!-- Can be also done by href="{url('/articles, $articles->id')}"-->
                <a href="/articles/{{$article->id}}">{{ $article->title }}</a>
            </h2>
            <div class="body">
                {{ $article->body }}
            </div>
        </article>
    @endforeach
    
@stop
