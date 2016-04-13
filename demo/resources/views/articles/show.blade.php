@extends("layouts/app")
@section("content")
    <article>
        <h2>{{ $article->title  }}</h2>
        <p>{{ $article->body }}</p>
        @unless($article->tags->isEmpty())
            <h5>Tag:</h5>
            <ul>
            @foreach($article->tags as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
            </ul>
        @endunless
    </article>
@stop