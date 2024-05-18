<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Menu;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
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
    function getComments($postId)
    {
        $post = Post::with('comments')->find($postId);
        return $post;
    }

    public function index($postId, $post = [], $column = '')
    {
        $post = $this->getComments($postId);
        $comments = $post->comments($column)->paginate(3);
        return view('comments.index', [
            'cutString' => [$this, 'cutString'],
            'menu' => $this->getMenu(),
            'comments' => $comments,
            'postId' => $postId,
            'user' => Auth::user()->name ?? false,
        ]);
    }
    public function store(Request $request, $postId, $commentId = false)
    {
        $userId = Auth::user()->id;
        $content = $request->input('comment');
        $on_the = $commentId ? 'comment' : 'post';
        
        Comment::create([
            'post_id' => $postId,
            'comment_id' => $commentId,
            'user_id' => $userId,
            'content' => $content,
            'on_the' => $on_the,
        ]);

        info('Добавлен новый комментарий', [
            'userId' => $userId,
            'postId' => $postId,
            'on_the' => $on_the,
        ]);

        return redirect(route('comment.index', ['postId' => $postId]));
    }
    public function like($postId, $commentId)
    {
        $comment = Comment::find($commentId);

        if ($comment) {

            $comment->like_count++;
            $comment->save();
        }
        return redirect()->route('comment.index', ['postId' => $postId]);
    }
    public function dislike($postId, $commentId)
    {
        $comment = Comment::find($commentId);

        if ($comment) {
            $comment->dislike_count++;
            $comment->save();
        }
        return redirect()->route('comment.index', ['postId' => $postId]);
    }
    public function popular($postId)
    {
        $post = Post::with('comments')->find($postId);
        return $this->index($postId, $post, 'like_count');
    }
    public function created($postId)
    {
        $post = Post::with('comments')->find($postId);
        return $this->index($postId, $post, 'created_at');
    }
}
