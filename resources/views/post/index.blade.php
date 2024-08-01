@extends('templates.header')
@section('breadcrumbs', Breadcrumbs::render('post', $post->id))
@section('content')
    <main class="flex-1 container mx-auto bg-white overflow-hidden px-4 sm:px-6">
        <div class="flex-grow-1 py-3 justify-content-between min-мh-100">
            <h1 class="text-black text-3xl font-bold mb-4">
                {{ $title }}
            </h1>

            @include('templates.post', ['post' => $post, 'user' => $user])
            @include('templates.footer')
        @endsection
