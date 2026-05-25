@props([
    'title' => 'CareerLog',
    'heading' => 'Welcome',
    'description' => 'Manage your career journey with CareerLog.',
])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title }} - CareerLog</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-50 text-slate-900">
    <main class="flex min-h-screen">
        {{-- Left Side --}}
        <section class="hidden w-1/2 flex-col justify-between bg-blue-600 p-10 text-white lg:flex">
            <div>
                <div class="inline-flex items-center gap-3">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-white/15">
                        <x-heroicon-o-briefcase class="h-6 w-6 text-white" />
                    </div>

                    <div>
                        <h1 class="text-2xl font-bold">
                            CareerLog
                        </h1>

                        <p class="text-sm text-blue-100">
                            Track your career journey
                        </p>
                    </div>
                </div>

                <div class="mt-24 max-w-3xl">
                    <p class="text-sm font-semibold uppercase tracking-wider text-blue-100">
                        Job Application Tracker
                    </p>

                    <h2 class="mt-4 text-5xl font-bold leading-tight xl:text-6xl">
                        Organize your applications, interviews, and progress in one calm workspace.
                    </h2>

                    <p class="mt-5 text-xl leading-8 text-blue-100">
                        Keep every company, position, status, salary expectation, and interview schedule neatly tracked.
                    </p>
                </div>
            </div>
        </section>

        {{-- Right Side --}}
        <section class="flex w-full items-start justify-center px-4 py-8 sm:px-6 lg:w-1/2 lg:items-center lg:px-8">
            <div class="w-full max-w-lg">
                {{-- Mobile Logo --}}
                <div class="mb-8 flex items-center gap-3 lg:hidden">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-600">
                        <x-heroicon-o-briefcase class="h-6 w-6 text-white" />
                    </div>

                    <div>
                        <h1 class="text-2xl font-bold text-blue-700">
                            CareerLog
                        </h1>

                        <p class="text-sm text-slate-500">
                            Track your career journey
                        </p>
                    </div>
                </div>

                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                    <div>
                        <h2 class="text-3xl font-bold tracking-tight text-slate-950">
                            {{ $heading }}
                        </h2>

                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            {{ $description }}
                        </p>
                    </div>

                    <div class="mt-8">
                        {{ $slot }}
                    </div>
                </div>

                <p class="mt-6 text-center text-xs text-slate-400">
                    CareerLog helps you keep your job search tidy, focused, and less chaotic.
                </p>
            </div>
        </section>
    </main>
</body>
</html>