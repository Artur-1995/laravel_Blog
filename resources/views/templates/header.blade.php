<?php
$user = Auth::user()->name ?? '';
?>
<!DOCTYPE html>
<html class="antialiased" lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/assets/css/tailwind.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>{{ $title }}</title>
    <link href="/favicon" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script> --}}
</head>

<body class="bg-white text-gray-600 font-sans leading-normal text-base tracking-normal flex min-h-screen flex-col">
    <div class="wrapper flex flex-1 flex-col bg-gray-100">
        <header class="container mx-auto bg-white overflow-hidden px-4 sm:px-6">
            <div class="border-b">
                <div
                    class="container mx-auto block overflow-hidden px-4 sm:px-6 sm:flex sm:justify-between sm:items-center py-4 space-y-4 sm:space-y-0">
                    <div class="flex justify-center">
                        <a href="/" class="inline-block sm:inline hover:opacity-75">
                            <img src="/assets/images/logo.png" width="222" height="30" alt="" />
                        </a>
                    </div>
                    <div class="flex justify-center">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <div class="container-fluid">
                                <a class="navbar-brand" href="#">Navbar</a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                    <div class="navbar-nav">
                                        <a class="nav-link active" aria-current="page"
                                            href="{{ route('posts.index') }}">Post</a>
                                        <a class="nav-link active" aria-current="page"
                                            href="{{ route('products') }}">Товары</a>
                                        <a class="nav-link" href="#">Features</a>
                                        <a class="nav-link" href="#">Pricing</a>
                                        <a class="nav-link disabled" href="#" tabindex="-1"
                                            aria-disabled="true">Disabled</a>
                                    </div>
                                </div>
                            </div>
                        </nav>
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
            <div class="container mx-auto px-4 sm:px-6">
                <section class="py-2">
                    @yield('breadcrumbs')
                </section>
            </div>
        </header>
        <main class="flex-1 container mx-auto bg-white overflow-hidden px-4 sm:px-6">
            <div class="flex-grow-1 py-3 justify-content-between min-мh-100">
                <h1 class="text-black text-3xl font-bold mb-4">
                    {{ $title }}
                </h1>
                @yield('content')
