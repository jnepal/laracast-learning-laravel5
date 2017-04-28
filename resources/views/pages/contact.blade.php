@extends('layout')

@section('content')
    <h1>Contact Me</h1>
    @if(count($peoples))
        <h2>People I like:</h2>
        <ul>
            @foreach($peoples as $people )
                <li>{{$people}}</li>
            @endforeach
        </ul>
    @endif
    
@section('footer')
    <script>alert('contact Me')</script>
@stop