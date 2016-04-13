@extends('layouts/app')
@section('content')
    <article>
        @foreach($articles as $article)
            <h2><a href="{{ url("articles/$article->id") }}">{{$article->title}}</a></h2>
            <p>{{$article->body}}</p>
        @endforeach
    </article>
@stop
