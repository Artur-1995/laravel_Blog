<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Models\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public static function getMenu()
    {
        $menu = Menu::all();
        return $menu;
    }
    public static function cutString(string $line, int $length = 12, string $appends = '...'): string
    {

        if (mb_strlen($line) > $length) {
            $line = mb_substr($line, 0, $length) . $appends;
        }

        return $line;
    }

    public function index($posts = [])
    {
        $user = Auth::user() ?? '';
        if (Auth::check()) {
            $posts = $posts ? $posts->paginate(10) : Post::paginate(10);
            return view('home.index', ['title' => 'Посты', 'cutString' => [$this, 'cutString'], 'menu' => $this->getMenu(), 'posts' => $posts, 'user' => $user]);
        }
        return redirect()->route('login');
    }

    public function create()
    {
        $user = Auth::user();
        return view('create.index', ['title' => 'Добавить пост', 'cutString' => [$this, 'cutString'], 'menu' => $this->getMenu(), 'user' => $user]);
    }

    public function store(Request $request, $userId)
    {
        $title = $request->input('title');
        $content = $request->input('content');
        Post::create([
            'title' => $title,
            'user_id' => $userId,
            'content' => $content,
        ]);

        info('Добавлен новый пост', [
            'title' => $title,
            'author' => $userId,
            'content' => $content,
        ]);

        return $this->create();
    }
    public function show($id, ...$user)
    {
        $post = Post::find($id);
        $user = Auth::user() ?? '';
        return view('post.index', ['title' => $post['title'], 'cutString' => [$this, 'cutString'], 'menu' => $this->getMenu(), 'post' => $post, 'user' => $user]);
    }
    public function edit($postId)
    {
        $post = Post::find($postId);
        return view('post_edit.index', ['title' => 'Изменить пост', 'cutString' => [$this, 'cutString'], 'menu' => $this->getMenu(), 'post' => $post]);
    }

    public function update(Request $request, $postId)
    {
        $author = Auth::user()->name;
        $title = $request->input('title');
        $content = $request->input('content');
        $post = Post::find($postId);

        if ($post['author'] == $author) {
            $post->title = $title;
            $post->content = $content;
        }

        $post->save();
        info('Пост обновлен', [
            'title' => $title,
            'author' => $author,
            'postId' => $postId,
        ]);
        return $this->show($postId);
    }
    public function delete($postId)
    {
        $author = Auth::user()->name;
        $post = Post::find($postId);

        if ($post['author'] == $author) {
            Post::destroy($postId);
        }

        return $this->index();
    }
    public function popular()
    {
        $posts = Post::orderByDesc('like_count');
        return $this->index($posts);
    }
    public function created()
    {
        $posts = Post::orderByDesc('created_at');
        return $this->index($posts);
    }

    public function like($postId)
    {
        $post = Post::find($postId); // Поиск поста по идентификатору

        if ($post) {
            $post->like_count++; // Увеличение значения поля "like" на единицу
            $post->save(); // Сохранение обновленной записи
        }
        return redirect()->route('post.show', ['postId' => $postId]);
    }
    public function dislike($postId)
    {
        $post = Post::find($postId); // Поиск поста по идентификатору

        if ($post) {
            $post->dislike_count++;
            $post->save();
        }
        return redirect()->route('post.show', ['postId' => $postId]);
    }

}
