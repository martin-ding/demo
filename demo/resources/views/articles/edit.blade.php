@extends('layouts/app')
    @section('content')
        <h1>Edit Article {{ $article->title }}</h1>

{{--        {!! Form::open(['method'=>'PATCH','url'=>'articles/'.$article->id]) !!}--}}
        {!! Form::model($article,['method'=>'PATCH','action'=>['ArticleController@update',$article->id]]) !!}

            @include('articles.form',['buttonText'=>'Edit an Article'])

        {!! Form::close() !!}
        @include("errors/list")
    @stop