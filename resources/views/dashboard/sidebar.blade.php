<aside class="fixed inset-y-0 left-0 z-40 hidden w-64 flex-col justify-between border-r border-slate-200 bg-white lg:flex">
    <div>
        <div class="px-6 py-8">
            <h1 class="text-2xl font-bold text-blue-700">
                CareerLog
            </h1>

            <p class="mt-1 text-sm text-slate-500">
                Track your career journey
            </p>
        </div>

        <nav class="mt-4 space-y-1 px-3">
            <x-sidebar-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                <x-heroicon-o-squares-2x2 class="h-5 w-5" />
                <span>Dashboard</span>
            </x-sidebar-link>

            <x-sidebar-link href="{{ route('companies.index') }}" :active="request()->routeIs('companies.*')">
                <x-heroicon-o-building-office-2 class="h-5 w-5" />
                <span>Companies</span>
            </x-sidebar-link>

            <x-sidebar-link href="{{ route('job-applications.index') }}" :active="request()->routeIs('job-applications.*')">
                <x-heroicon-o-document-text class="h-5 w-5" />
                <span>Applications</span>
            </x-sidebar-link>
        </nav>
    </div>

    <form method="POST" action="{{ route('logout') }}" class="px-6 pb-6">
        @csrf

        <button
            type="submit"
            class="flex w-full items-center justify-center gap-3 rounded-lg bg-red-500 px-4 py-2.5 text-sm font-medium text-white transition hover:bg-red-600"
        >
            <x-heroicon-o-arrow-left-on-rectangle class="h-5 w-5" />
            <span>Logout</span>
        </button>
    </form>
</aside>

{{-- Mobile Sidebar --}}
<div
    x-show="mobileSidebarOpen"
    x-cloak
    class="fixed inset-0 z-50 lg:hidden"
>
    {{-- Backdrop --}}
    <div
        @click="mobileSidebarOpen = false"
        class="absolute inset-0 bg-slate-900/45"
    ></div>

    {{-- Sidebar Panel --}}
    <aside
        class="absolute inset-y-0 left-0 flex h-dvh w-[82vw] max-w-xs flex-col overflow-hidden border-r border-slate-200 bg-white shadow-2xl"
    >
        {{-- Header --}}
        <div class="shrink-0 border-b border-slate-200 px-5 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-lg font-bold leading-tight text-blue-700">
                        CareerLog
                    </h1>

                    <p class="mt-0.5 text-xs text-slate-500">
                        Track your career journey
                    </p>
                </div>

                <button
                    type="button"
                    @click="mobileSidebarOpen = false"
                    class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-slate-400 transition hover:bg-slate-100 hover:text-slate-700"
                    aria-label="Close menu"
                >
                    <x-heroicon-o-x-mark class="h-5 w-5" />
                </button>
            </div>
        </div>

        {{-- Navigation, ini yang boleh scroll kalau menu banyak --}}
        <nav class="flex-1 space-y-2 overflow-y-auto px-4 py-5">
            <x-sidebar-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                <x-heroicon-o-squares-2x2 class="h-5 w-5" />
                <span>Dashboard</span>
            </x-sidebar-link>

            <x-sidebar-link href="{{ route('companies.index') }}" :active="request()->routeIs('companies.*')">
                <x-heroicon-o-building-office-2 class="h-5 w-5" />
                <span>Companies</span>
            </x-sidebar-link>

            <x-sidebar-link href="{{ route('job-applications.index') }}" :active="request()->routeIs('applications.*')">
                <x-heroicon-o-document-text class="h-5 w-5" />
                <span>Applications</span>
            </x-sidebar-link>
        </nav>

        {{-- Logout, ini tetap di bawah dan tidak ikut scroll --}}
        <div class="shrink-0 border-t border-slate-100 bg-white px-4 py-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button
                    type="submit"
                    class="flex w-full items-center justify-center gap-3 rounded-lg bg-red-500 px-4 py-3 text-sm font-semibold text-white transition hover:bg-red-600 active:scale-[0.99]"
                >
                    <x-heroicon-o-arrow-left-on-rectangle class="h-5 w-5" />
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>
</div>