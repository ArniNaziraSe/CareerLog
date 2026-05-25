@props([
    'title' => 'CareerLog',
])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $title }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="overflow-x-hidden bg-slate-50 text-slate-900">
    <div x-data="{ mobileSidebarOpen: false }" class="min-h-screen overflow-x-hidden">
        @include('dashboard.sidebar')

        <main class="min-h-screen overflow-x-hidden px-4 py-5 sm:px-6 lg:pl-72 lg:pr-8">
            @include('dashboard.mobile-header')

            <div class="mx-auto w-full max-w-[1600px]">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>
</html>