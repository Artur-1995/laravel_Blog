@include('templates.header', [
    'title' => $title,
    'menu' => $menu,
])

@include('templates.post', ['post' => $post, 'user' => $user])
@include('templates.footer')
