<section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
    {{-- Total Applications --}}
    <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="flex items-start justify-between">
            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">
                Total Applications
            </p>

            <x-heroicon-o-document-text class="h-6 w-6 text-blue-600" />
        </div>

        <p class="mt-5 text-3xl font-bold text-slate-950">
            {{ $totalApplications }}
        </p>

        <p class="mt-1 text-sm text-slate-600">
            All tracked applications
        </p>
    </div>

    {{-- Accepted --}}
    <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="flex items-start justify-between">
            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">
                Accepted
            </p>

            <x-heroicon-o-check-circle class="h-6 w-6 text-emerald-600" />
        </div>

        <p class="mt-5 text-3xl font-bold text-slate-950">
            {{ $acceptedApplications }}
        </p>

        <p class="mt-1 text-sm text-slate-600">
            Applications accepted
        </p>
    </div>

    {{-- Rejected --}}
    <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="flex items-start justify-between">
            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">
                Rejected
            </p>

            <x-heroicon-o-x-circle class="h-6 w-6 text-red-600" />
        </div>

        <p class="mt-5 text-3xl font-bold text-slate-950">
            {{ $rejectedApplications }}
        </p>

        <p class="mt-1 text-sm text-slate-600">
            Applications rejected
        </p>
    </div>

    {{-- Ghosted --}}
    <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="flex items-start justify-between">
            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">
                Ghosted
            </p>

            <x-heroicon-o-eye-slash class="h-6 w-6 text-slate-500" />
        </div>

        <p class="mt-5 text-3xl font-bold text-slate-950">
            {{ $ghostedApplications }}
        </p>

        <p class="mt-1 text-sm text-slate-600">
            No response yet
        </p>
    </div>
</section>