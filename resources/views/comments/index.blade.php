@extends('templates.header')
@section('breadcrumbs', Breadcrumbs::render('comment', $postId))
@section('content')


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
