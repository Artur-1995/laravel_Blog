<div class="container " id="post-container">
    <div class="post bg-white py-4">
        <p class="post-content">{{ $post['content'] }}</p>
        <span class="post-date">Дата публикации: {{ $post['created_at']->format('d-m-Y') }}
        </span>
        <div>
            @if ($post['updated_at'])
                <span class="post-update">Дата последнего обновления: {{ $post['updated_at']->format('d-m-Y') }}
                </span>
            @endif
        </div>

    </div>

    <a class="text-gray-500 hover:text-orange" href="{{ route('comment.index', ['postId' => $post['id']]) }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block text-orange h-4 w-4" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
            </path>
        </svg>
        комментарии
    </a>
    <a class="text-gray-500 hover:text-orange" href="{{ route('post.like', ['postId' => $post['id']]) }}"
        style="display: inline-block; ">
        <svg style="display: inline-block; margin-left: 10px; margin-top: -3px;" width="15px" height="15px"
            viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <style>
                    .cls-1 {
                        fill: #9f4c4c;
                        fill-rule: evenodd;
                    }
                </style>
            </defs>
            <path class="cls-1"
                d="M663.187,148.681a4.511,4.511,0,0,1-6.375,0S630,127.085,630,107a17,17,0,0,1,17-17c7.625,0,11.563,6.057,13,6.057S665.375,90,673,90a17,17,0,0,1,17,17C690,127.085,663.187,148.681,663.187,148.681Z"
                id="favorite" transform="translate(-630 -90)" />
        </svg>
        {{ $post['like_count'] ?? __('Поставить лайк') }}
    </a>
    <a class="text-gray-500 hover:text-orange" href="{{ route('post.dislike', ['postId' => $post['id']]) }}"
        style="display: inline-block; ">
        <svg style="display: inline-block; margin-left: 10px; margin-top: -3px;" width="15px" height="15px"
            viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <style>
                    rf .cls-2 {
                        fill: #0c0c0c;
                        fill-rule: evenodd;
                    }
                </style>
            </defs>
            <path class="cls-2"
                d="M663.187,148.681a4.511,4.511,0,0,1-6.375,0S630,127.085,630,107a17,17,0,0,1,17-17c7.625,0,11.563,6.057,13,6.057S665.375,90,673,90a17,17,0,0,1,17,17C690,127.085,663.187,148.681,663.187,148.681Z"
                id="favorite" transform="translate(-630 -90)" />
        </svg>

        {{ $post['dislike_count'] ?? __('Поставить Дизлайк') }}
    </a>
    @if ($post['author'] == $user['name'])
        <a href="{{ route('post.edit', ['postId' => $post['id']]) }}"
            class="inline-block focus:outline-none font-bold py-2 px-2 rounded" role="button">
            Редактировать
        </a>
        <a href="{{ route('post.delete', ['postId' => $post['id']]) }}"
            class="inline-block focus:outline-none font-bold py-2 px-2 rounded" role="button">
            Удалить
        </a>
    @endif
</div>
