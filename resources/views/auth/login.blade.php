<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Login - CareerLog</title>

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

                    <h2 class="mt-4 text-6xl font-bold leading-tight">
                        Organize your applications, interviews, and progress in one calm workspace.
                    </h2>

                    <p class="mt-5 text-2xl leading-7 text-blue-100">
                        Keep every company, position, status, salary expectation, and interview schedule neatly tracked.
                    </p>
                </div>
            </div>
        </section>

        {{-- Right Side --}}
        <section class="flex w-full items-center justify-center px-4 py-10 sm:px-6 lg:w-1/2 lg:px-8">
            <div class="w-full max-w-md">
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
                    {{-- Session Status --}}
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <div>
                        <h2 class="text-3xl font-bold tracking-tight text-slate-950">
                            Welcome back
                        </h2>

                        <p class="mt-2 text-sm text-slate-600">
                            Login to continue tracking your job applications.
                        </p>
                    </div>

                    {{-- Login Form --}}
                    <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-5">
                        @csrf

                        {{-- Email --}}
                        <div>
                            <label for="email" class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-700">
                                Email Address
                            </label>

                            <div class="relative">
                                <x-heroicon-o-envelope class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" />

                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    autofocus
                                    autocomplete="username"
                                    placeholder="you@example.com"
                                    class="w-full rounded-xl border border-slate-200 bg-white py-3 pl-12 pr-4 text-base text-slate-700 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                                >
                            </div>

                            @error('email')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div x-data="{ showPassword: false }">
                            <label for="password" class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-700">
                                Password
                            </label>

                            <div class="relative">
                                <x-heroicon-o-lock-closed class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" />

                                <input
                                    id="password"
                                    :type="showPassword ? 'text' : 'password'"
                                    name="password"
                                    required
                                    autocomplete="current-password"
                                    placeholder="Enter your password"
                                    class="w-full rounded-xl border border-slate-200 bg-white py-3 pl-12 pr-12 text-base text-slate-700 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                                >

                                <button
                                    type="button"
                                    @click="showPassword = !showPassword"
                                    class="absolute right-3 top-1/2 inline-flex h-9 w-9 -translate-y-1/2 items-center justify-center rounded-lg text-slate-400 transition hover:bg-slate-100 hover:text-slate-700"
                                    aria-label="Toggle password visibility"
                                >
                                    <x-heroicon-o-eye
                                        x-show="!showPassword"
                                        x-cloak
                                        class="h-5 w-5"
                                    />

                                    <x-heroicon-o-eye-slash
                                        x-show="showPassword"
                                        x-cloak
                                        class="h-5 w-5"
                                    />
                                </button>
                            </div>

                            @error('password')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Remember Me --}}
                        <div class="flex items-center justify-between gap-4">
                            <label for="remember_me" class="inline-flex items-center gap-2 text-sm text-slate-600">
                                <input
                                    id="remember_me"
                                    type="checkbox"
                                    name="remember"
                                    class="rounded border-slate-300 text-blue-600 focus:ring-blue-500"
                                >

                                <span>Remember me</span>
                            </label>
                        </div>

                        {{-- Submit --}}
                        <button
                            type="submit"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-200"
                        >
                            <x-heroicon-o-arrow-right-on-rectangle class="h-5 w-5" />
                            Login
                        </button>
                    </form>

                    <p class="mt-6 text-center text-sm text-slate-600">
                        Don’t have an account?

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="font-semibold text-blue-700 hover:text-blue-800">
                                Create account
                            </a>
                        @endif
                    </p>

                    <p class="mt-6 text-center text-sm text-slate-600">
                        CareerLog job application tracker
                    </p>
                </div>

                <p class="mt-6 text-center text-xs text-slate-400">
                    CareerLog helps you keep your job search tidy, focused, and less chaotic.
                </p>
            </div>
        </section>
    </main>
</body>
</html>