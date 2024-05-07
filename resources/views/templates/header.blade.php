<?php
$user = Auth::user()->name ?? '';
?>
<!DOCTYPE html>
<html class="antialiased" lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/assets/css/tailwind.css" rel="stylesheet" />
    <title>{{ $title }}</title>
</head>

<body class="bg-white text-gray-600 font-sans leading-normal text-base tracking-normal flex min-h-screen flex-col">
    <div class="wrapper flex flex-1 flex-col bg-gray-100">
        <header class="bg-white">
            <div class="border-b">
                <div
                    class="container mx-auto block overflow-hidden px-4 sm:px-6 sm:flex sm:justify-between sm:items-center py-4 space-y-4 sm:space-y-0">
                    <div class="flex justify-center">
                        <a href="/" class="inline-block sm:inline hover:opacity-75">
                            <img src="/assets/images/logo.png" width="222" height="30" alt="" />
                        </a>
                    </div>
                    <div>
                        @if ($user)
                            @include('templates.user_auth', ['user' => Auth::user()])
                        @else
                            @include('templates.user_not_auth')
                        @endif
                    </div>
                </div>
            </div>
            <div class="border-b">
                <div class="container mx-auto overflow-hidden px-4 sm:px-6">
                    <section class="bg-white py-4">
                        @includeWhen(['menu' => $menu, 'cutString' => $cutString], 'templates.menu')
                    </section>
                </div>
            </div>
        </header>
        <main class="flex-1 container mx-auto bg-white overflow-hidden px-4 sm:px-6">
            <div class="flex-grow-1 py-3 justify-content-between min-мh-100">
                <h1 class="text-black text-3xl font-bold mb-4">
                    {{ $title }}
                </h1>
