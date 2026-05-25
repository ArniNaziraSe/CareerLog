<header class="mb-6 flex items-center justify-between rounded-2xl border border-slate-200 bg-white px-4 py-3 shadow-sm lg:hidden">
    <div class="flex min-w-0 items-center gap-3">
        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-blue-600 text-white">
            <x-heroicon-o-briefcase class="h-6 w-6" />
        </div>

        <div class="min-w-0">
            <h1 class="truncate text-xl font-bold text-blue-700">
                CareerLog
            </h1>

            <p class="truncate text-xs text-slate-500">
                Track your career journey
            </p>
        </div>
    </div>

    <button
        type="button"
        @click="mobileSidebarOpen = true"
        class="inline-flex h-11 w-11 shrink-0 items-center justify-center rounded-xl border border-slate-200 bg-slate-50 text-slate-700 shadow-sm transition hover:bg-slate-100"
        aria-label="Open menu"
    >
        <x-heroicon-o-bars-3 class="h-6 w-6" />
    </button>
</header>