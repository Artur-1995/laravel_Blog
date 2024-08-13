<?php

use App\Models\Post;

Breadcrumbs::register('posts.index', function ($breadcrumbs) {
    // $breadcrumbs->parent('<Parent route>’');
    $breadcrumbs->push('Посты', route('posts.index'));
});

Breadcrumbs::register('post', function ($breadcrumbs, $postId) {
    $breadcrumbs->parent('posts.index');
    $breadcrumbs->push(Post::find($postId)->title, route('post.show', $postId));
});
Breadcrumbs::register('comment', function ($breadcrumbs, $postId) {
    $breadcrumbs->parent('post', $postId);
    $breadcrumbs->push('Комментарий', route('comment.index', $postId));
});

Breadcrumbs::register('products', function ($breadcrumbs) {
    // $breadcrumbs->parent('<Parent route>’');
    $breadcrumbs->push('Товары', route('products'));
});
Breadcrumbs::register('product', function ($breadcrumbs, $offer_id) {
    $breadcrumbs->parent('products');
    $breadcrumbs->push($offer_id, route('product.index', $offer_id));
});


// $breadcrumbs->parent('<Parent route>’');
// This line describes the parent link to that page in that path

// $breadcrumbs->push('<title of breadcrumb>', route('<page route>'));
// This defines the route method to be performed on click

// Breadcrumbs::register('contact', function($breadcrumbs)
// {
// 	$breadcrumbs->parent('home');
// 	$breadcrumbs->push('Contact', route('contact'));
// });