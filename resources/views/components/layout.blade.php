<!DOCTYPE html>
<html lang="en" data-theme="laravelChirper">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) ? $title . ' - BlogApp' : 'BlogApp' }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />
    <meta property="og:image" content={{ asset('images/og.jpeg') }} />
    <meta property="og:title" content="Chirper" />
    <meta property="og:description"
          content="A demo social media platform highlighting the power and simplicity of Laravel." />
    <meta property="og:url" content="https://chirper.laravel.cloud" />

    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon-96x96.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex flex-col
        bg-base-200 font-sans">
<nav class="navbar bg-base-100">
    <div class="navbar-start">
        <a href="/"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 312 69"
                         class="h-7 w-auto px-4">
                <path fill="#D9D9D9"
                      d="M40.97.446c22.091 0 40 17.909 40 40a39.805 39.805 0 0 1-6.56 21.95c-.61.928-1.87 1.105-2.825.541a18.92 18.92 0 0 0-9.651-2.63c-.787 0-1.563.048-2.325.141a19.108 19.108 0 0 0-7.03-9.607 18.57 18.57 0 0 0 5.996-11.778l8.493-7.543a.931.931 0 0 0-.43-1.607l-10.423-2.138c-3.207-5.575-9.218-9.329-16.103-9.329-10.256 0-18.57 8.33-18.571 18.605 0 1.274.128 2.519.372 3.721-6.58.032-12.37 3.407-15.764 8.517-1.07 1.61-3.854 1.582-4.265-.306a40.101 40.101 0 0 1-.914-8.537c0-22.091 17.908-40 40-40Z" />
                <path fill="url(#a)"
                      d="M40.97.446c22.091 0 40 17.909 40 40a39.805 39.805 0 0 1-6.56 21.95c-.61.928-1.87 1.105-2.825.541a18.92 18.92 0 0 0-9.651-2.63c-.787 0-1.563.048-2.325.141a19.108 19.108 0 0 0-7.03-9.607 18.57 18.57 0 0 0 5.996-11.778l8.493-7.543a.931.931 0 0 0-.43-1.607l-10.423-2.138c-3.207-5.575-9.218-9.329-16.103-9.329-10.256 0-18.57 8.33-18.571 18.605 0 1.274.128 2.519.372 3.721-6.58.032-12.37 3.407-15.764 8.517-1.07 1.61-3.854 1.582-4.265-.306a40.101 40.101 0 0 1-.914-8.537c0-22.091 17.908-40 40-40Z" />
                <path fill="#D9D9D9"
                      d="M45.065 28.834a3.718 3.718 0 0 1 3.714 3.72 3.719 3.719 0 0 1-3.715 3.722 3.719 3.719 0 0 1-3.713-3.721 3.718 3.718 0 0 1 3.714-3.721Z" />
                <path fill="url(#b)"
                      d="M45.065 28.834a3.718 3.718 0 0 1 3.714 3.72 3.719 3.719 0 0 1-3.715 3.722 3.719 3.719 0 0 1-3.713-3.721 3.718 3.718 0 0 1 3.714-3.721Z" />
                <text x="70%" y="55%"
                      text-anchor="middle"
                      dominant-baseline="middle"
                      fill="#1B1B18"
                      font-size="42"
                      font-family="Arial, Helvetica, sans-serif"
                      font-weight="bold">
                    Blog App
                </text>
                <defs>
                    <linearGradient id="a" x1=".97" x2="72.586" y1=".446" y2="80.006"
                                    gradientUnits="userSpaceOnUse">
                        <stop stop-color="#45B8FF" />
                        <stop offset="1" stop-color="#4B2A99" />
                    </linearGradient>
                    <linearGradient id="b" x1=".97" x2="72.586" y1=".446" y2="80.006"
                                    gradientUnits="userSpaceOnUse">
                        <stop stop-color="#45B8FF" />
                        <stop offset="1" stop-color="#4B2A99" />
                    </linearGradient>
                </defs>
            </svg></a>
    </div>
    <div class="navbar-end gap-4 px-4">
        @auth
            <span class="text-sm">{{ auth()->user()->name }}</span>
            <form method="POST" action="/logout" class="inline">
                @csrf
                <button type="submit" class="btn btn-ghost btn-sm">Sair</button>
            </form>
        @else
            <a href="/login" class="btn btn-ghost btn-sm">Entrar</a>
            <a href="/register" class="btn btn-primary btn-sm">Cadastrar</a>
        @endauth
    </div>
</nav>

<!-- Success Toast -->
@if (session('success'))
    <div class="toast toast-top toast-center">
        <div class="alert alert-success animate-fade-out">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    </div>
@endif

<main class="flex-1 container mx-auto px-4 py-8">
    {{ $slot }}
</main>

<footer class="footer footer-center p-5 bg-base-300 text-base-content text-xs">
    <div>
        <p>© {{ date('Y') }} Blog App - Built with Laravel and ❤️</p>
    </div>
</footer>
</body>
</html>
