<?php
if (!empty($_POST['title']) && !empty($_POST['content'])) {
    $message = 'Пост опубликован';
} else {
    $message = 'Заполните все поля';
}

?>
@include('templates.header', ['title' => $title])
@if (!empty($_POST['title']) && !empty($_POST['content']))
    @include('templates.messages.successful_message', ['message' => $message]);
    <a href="{{ route('post.create') }}"
        class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded"
        role="button">
        Опубликовать новый пост
    </a>
@else
    @if (!empty($_POST))
        @include('templates.messages.error_message', ['message' => $message]);
    @endif
    <form action="{{ route('post.store', ['user' => $user['name']]) }}" method="POST">
        @csrf
        <div class="mt-8 max-w-md">
            <div class="grid grid-cols-1 gap-6">
                <div class="block">
                    <label for="fieldTitle" class="text-gray-700 font-bold">Заголовок</label>
                    <input id="fieldTitle" name="title" type="text"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder="Введите заголовок">
                </div>
                <div class="block">
                    <label for="fieldContent" class="text-gray-700 font-bold">Текст поста</label>
                    <textarea id="fieldContent" name="content"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder="Текст поста"></textarea>
                </div>
                <div class="block">
                    <button type="submit"
                        class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                        Опубликовать
                    </button>
                </div>
            </div>
        </div>
    </form>
@endif
@include('templates.footer')
