@include('templates.header', [
    'title' => $title,
    'menu' => $menu,
])

<p>Сортировать:</p>
<nav>
    <ul>
        <li><a href="{{ route('post.created') }}">По дате</a></li>
        <li><a href="{{ route('post.popular') }}">По популярности</a></li>
    </ul>
</nav>

<div class="py-10">
    <ul>
        @foreach ($posts as $post)
            <li>
                <a href="{{ route('post.show', $post['id']) }}">
                    <p>
                        {{ call_user_func($cutString, (string) $post['title']) }}
                    </p>
                    <p>
                        {{ call_user_func($cutString, (string) $post['content'], 33) }}
                    </p>
                </a>
            </li>
        @endforeach
    </ul>
</div>

{{ $posts->links() }}
@include('templates.footer')
