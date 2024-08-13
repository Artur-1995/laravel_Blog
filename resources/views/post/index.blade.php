@extends('templates.header')
@section('breadcrumbs', Breadcrumbs::render('post', $post->id))
@section('content')


    @include('templates.post', ['post' => $post, 'user' => $user])
    @include('templates.footer')
@endsection
