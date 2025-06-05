<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    @vite(['resources/css/app.css'])
</head>
<body class="antialiased">
    <header class="p-3 bg-gray-100 mb-6">
        <div class="container">
            <div class="flex gap-x-3">
                <a href="{{ route('product.index') }}" class="px-3 py-1.5 border-b {{ Route::is(['product.*', 'welcome'])?'border-blue-300':'border-gray-400' }}">Товары</a>
                <a href="{{ route('order.index') }}" class="px-3 py-1.5 border-b {{ Route::is('order.*')?'border-blue-400':'border-gray-400' }}">Заказы</a>
            </div>
        </div>
    </header>

    @yield('content')
</body>
</html>
