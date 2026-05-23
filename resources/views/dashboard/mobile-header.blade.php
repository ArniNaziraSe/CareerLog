<header class="mb-6 flex items-center justify-between rounded-2xl border border-slate-200 bg-white px-4 py-3 shadow-sm lg:hidden">
    <div class="flex items-center gap-3">
        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-600 text-white">
            <x-heroicon-o-briefcase class="h-5 w-5" />
        </div>

        <div>
            <h1 class="text-lg font-bold leading-tight text-blue-700">
                CareerLog
            </h1>

            <p class="text-xs text-slate-500">
                Track your career journey
            </p>
        </div>
    </div>

    <button
        type="button"
        @click="mobileSidebarOpen = true"
        class="inline-flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-slate-50 text-slate-700 transition hover:bg-blue-50 hover:text-blue-700 active:scale-95"
        aria-label="Open menu"
    >
        <x-heroicon-o-bars-3 class="h-6 w-6" />
    </button>
</header>