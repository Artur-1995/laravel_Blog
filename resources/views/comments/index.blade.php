@extends('templates.header')
@section('breadcrumbs', Breadcrumbs::render('comment', $postId))
@section('content')
    <main class="flex-1 container mx-auto bg-white overflow-hidden px-4 sm:px-6">
        <div class="flex-grow-1 py-3 justify-content-between min-мh-100">
            <h1 class="text-black text-3xl font-bold mb-4">
                {{ $title }}
            </h1>

            <div class="headings d-flex justify-content-between align-items-center mb-3">
                <div class="buttons">
                    <div class="card p-6" style="border: none;">
                        <p>Сортировать:</p>
                        <nav>
                            <ul>
                                <li><a href="{{ route('comment.created', ['postId' => $postId]) }}">По дате</a></li>
                                <li><a href="{{ route('comment.popular', ['postId' => $postId]) }}">По популярности</a></li>
                            </ul>
                        </nav>
                        @include('templates.comments', [
                            'comments' => $comments,
                            'postId' => $postId,
                            'user' => $user,
                        ])
                    </div>

                </div>
                {{ $comments->links() }}

                @include('templates.footer')
            @endsection
