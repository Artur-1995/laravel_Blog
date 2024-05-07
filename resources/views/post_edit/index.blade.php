@include('templates.header', ['title' => $title])
<form action="{{ route('post.update', ['postId' => $post['id']]) }}" method="POST">
    @csrf
    <div class="mt-8 max-w-md">
        <div class="grid grid-cols-1 gap-6">
            <div class="block">
                <label for="fieldTitle" class="text-gray-700 font-bold">Заголовок</label>
                <input id="fieldTitle" name="title" type="text"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    value="{{ $post['title'] }}">
            </div>
            <div class="block">
                <label for="fieldContent" class="text-gray-700 font-bold">Текст поста</label>
                <textarea id="fieldContent" name="content" type="text"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    {{ $post['content'] }}
                </textarea>
            </div>
            <div class="block">
                <button type="submit"
                    class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                    Изменить
                </button>
            </div>
        </div>
    </div>
</form>
@include('templates.footer')
