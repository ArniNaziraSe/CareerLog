<x-layouts.auth-careerlog
    title="Register"
    heading="Create account"
    description="Start tracking your job applications, companies, and interview progress."
>
    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div>
            <label for="name" class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-700">
                Name
            </label>

            <div class="relative">
                <x-heroicon-o-user class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" />

                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="Your name"
                    class="w-full rounded-lg border border-slate-200 bg-white py-3 pl-11 pr-4 text-sm text-slate-700 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                >
            </div>

            @error('name')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

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
                    autocomplete="username"
                    placeholder="you@example.com"
                    class="w-full rounded-lg border border-slate-200 bg-white py-3 pl-11 pr-4 text-sm text-slate-700 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                >
            </div>

            @error('email')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

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
                    autocomplete="new-password"
                    placeholder="Create password"
                    class="w-full rounded-xl border border-slate-200 bg-white py-3 pl-12 pr-12 text-base text-slate-700 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                >

                <button
                    type="button"
                    @click="showPassword = !showPassword"
                    class="absolute right-3 top-1/2 inline-flex h-9 w-9 -translate-y-1/2 items-center justify-center rounded-lg text-slate-400 transition hover:bg-slate-100 hover:text-slate-700"
                >
                    <x-heroicon-o-eye x-show="!showPassword" x-cloak class="h-5 w-5" />
                    <x-heroicon-o-eye-slash x-show="showPassword" x-cloak class="h-5 w-5" />
                </button>
            </div>

            @error('password')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div x-data="{ showPassword: false }">
            <label for="password_confirmation" class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-700">
                Confirm Password
            </label>

            <div class="relative">
                <x-heroicon-o-shield-check class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" />

                <input
                    id="password_confirmation"
                    :type="showPassword ? 'text' : 'password'"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="Confirm password"
                    class="w-full rounded-xl border border-slate-200 bg-white py-3 pl-12 pr-12 text-base text-slate-700 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                >

                <button
                    type="button"
                    @click="showPassword = !showPassword"
                    class="absolute right-3 top-1/2 inline-flex h-9 w-9 -translate-y-1/2 items-center justify-center rounded-lg text-slate-400 transition hover:bg-slate-100 hover:text-slate-700"
                >
                    <x-heroicon-o-eye x-show="!showPassword" x-cloak class="h-5 w-5" />
                    <x-heroicon-o-eye-slash x-show="showPassword" x-cloak class="h-5 w-5" />
                </button>
            </div>

            @error('password_confirmation')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <button
            type="submit"
            class="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-blue-700"
        >
            <x-heroicon-o-user-plus class="h-5 w-5" />
            Register
        </button>

        <p class="text-center text-sm text-slate-600">
            Already registered?

            <a href="{{ route('login') }}" class="font-semibold text-blue-700 hover:text-blue-800">
                Login
            </a>
        </p>
    </form>
</x-layouts.auth-careerlog>