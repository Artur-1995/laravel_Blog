<div class="card py-5">
    <span class="dots">Комментарии:</span>
    <div class="action d-flex justify-content-between mt-2 align-items-center">

        <div class="reply py-4 px-10">
            <span class="dots "> Написать комментарий </span>
            <form action="{{ route('comment.store', ['postId' => $postId, 'commentId' => $comment->id ?? 0]) }}"
                method="GET">
                <input id="fieldComment" name="comment" type="text" placeholder="Введите сообщение" class="rounded"
                    style="
                    border-color: #e5e7eb;
                    padding-left: 0.2rem;
                    border-width: 0.2 px;
                    padding-inline-end: 4px;

                    ">
                <button type="submit">отправить</button>
            </form>
        </div>
        <div class="reply py-4 px-10">
            @if (!empty($comments))
                @foreach ($comments as $comment)
                    <?php
                    $createdAt = $comment->created_at;
                    $diff = $createdAt->diffForHumans(now());
                    ?>
                    <div class="py-2">
                        <img src="https://i.imgur.com/hczKIze.jpg" width="30" class="user-img rounded-circle mr-2 "
                            style="float: left; border-radius: 50%; border: 1px #cfc solid; box-shadow: 0 0 10px #444;" />
                    </div>
                    <div>
                        <small class="font-weight-bold text-primary" style="line-height: 2px;">
                            {{ $comment->author . ', ' }}
                        </small>

                        <div class="reply px-4" id="longText" onclick="toggleText()" style="max-width: 300px;">
                            {{ ucfirst($comment->content) }}
                        </div>

                        <div class="reply px-4">
                            <a class="text-gray-500 hover:text-orange"
                                href="{{ route('comment.like', ['postId' => $postId, 'commentId' => $comment['id']]) }}"
                                style="display: inline-block; ">
                                <svg style="display: inline-block; margin-left: 2px; margin-top: -3px;" width="15px"
                                    height="15px" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg">
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
                                {{ $comment['like_count'] ?? __('Поставить лайк') }}
                            </a>

                            <a class="text-gray-500 hover:text-orange"
                                href="{{ route('comment.dislike', ['postId' => $postId, 'commentId' => $comment['id'] ?? '']) }}"
                                style="display: inline-block; ">
                                <svg style="display: inline-block; margin-left: 10px; margin-top: -3px;" width="15px"
                                    height="15px" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg">
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

                                {{ $comment['dislike_count'] ?? __('Поставить Дизлайк') }}
                            </a>
                        </div>
                    </div>
                    <div class="reply px-4">
                        <small>{{ $diff }}
                        </small>
                    </div>
                    @if ($comment['dislike_count'] >= 10)
                        <div class="reply py-2 px-6">
                            <span class="dots"></span>
                            <form
                                action="{{ route('comment.store', ['postId' => $postId, 'commentId' => $comment->id ?? 0]) }}"
                                method="GET">
                                <input id="fieldComment" name="comment" type="text" placeholder="Введите сообщение"
                                    class="rounded"
                                    style="
                            border-color: #e5e7eb;
                            padding-left: 0.2rem;
                            border-width: 0.2 px;
                            padding-inline-end: 4px;

                            ">
                                <button type="submit">ответить</button>
                            </form>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
