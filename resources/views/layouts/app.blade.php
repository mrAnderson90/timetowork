<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'TimeToWork')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">
            TimeToWork
        </a>
    </div>
</nav>

<main class="container py-4">
    @if($errors->any())
        <div class="alert alert-danger mb-2">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success mb-2">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')

</main>

</body>
</html>
