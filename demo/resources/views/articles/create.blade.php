@extends('layouts/app')

@section('content')
    <h1>create a new article</h1>

    {!! Form::open(['url'=>'articles']) !!}

        @include("articles.form",['buttonText'=>'Add an Article'])

    {!! Form::close() !!}

    @include("errors.list")

@endsection