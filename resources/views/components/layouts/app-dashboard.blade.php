<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $title ?? 'CareerLog' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="overflow-x-hidden bg-slate-50 text-slate-900">
    <div x-data="{ mobileSidebarOpen: false }" class="min-h-screen w-full overflow-x-hidden">
        @include('dashboard.sidebar')

        <main class="min-h-screen w-full overflow-x-hidden px-4 py-5 sm:px-6 lg:ml-64 lg:px-8">
            @include('dashboard.mobile-header')

            {{ $slot }}
        </main>
    </div>
</body>
</html>