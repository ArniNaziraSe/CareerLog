<section class="mt-8 rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
    <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h3 class="text-xl font-bold text-slate-950">
                Pipeline Overview
            </h3>

            <p class="mt-1 text-sm text-slate-500">
                Track your application progress by current status.
            </p>
        </div>

        <span class="inline-flex w-fit items-center rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">
            24 Total Applications
        </span>
    </div>

    <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5">
        {{-- Applied --}}
        <div class="rounded-xl border border-slate-200 bg-slate-50 p-4 transition hover:-translate-y-1 hover:bg-white hover:shadow-sm">
            <div class="flex items-center justify-between">
                <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-blue-100 text-blue-700">
                    <x-heroicon-o-paper-airplane class="h-5 w-5" />
                </div>

                <span class="text-2xl font-bold text-slate-950">
                    12
                </span>
            </div>

            <div class="mt-4">
                <p class="font-semibold text-slate-800">
                    Applied
                </p>

                <p class="mt-1 text-xs text-slate-500">
                    Resume submitted
                </p>
            </div>

            <div class="mt-4 h-2 overflow-hidden rounded-full bg-slate-200">
                <div class="h-full w-[50%] rounded-full bg-blue-500"></div>
            </div>

            <p class="mt-2 text-xs font-medium text-slate-500">
                50% of pipeline
            </p>
        </div>

        {{-- Screening --}}
        <div class="rounded-xl border border-slate-200 bg-slate-50 p-4 transition hover:-translate-y-1 hover:bg-white hover:shadow-sm">
            <div class="flex items-center justify-between">
                <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-violet-100 text-violet-700">
                    <x-heroicon-o-chat-bubble-left-right class="h-5 w-5" />
                </div>

                <span class="text-2xl font-bold text-slate-950">
                    5
                </span>
            </div>

            <div class="mt-4">
                <p class="font-semibold text-slate-800">
                    Screening
                </p>

                <p class="mt-1 text-xs text-slate-500">
                    Recruiter review
                </p>
            </div>

            <div class="mt-4 h-2 overflow-hidden rounded-full bg-slate-200">
                <div class="h-full w-[21%] rounded-full bg-violet-500"></div>
            </div>

            <p class="mt-2 text-xs font-medium text-slate-500">
                21% of pipeline
            </p>
        </div>

        {{-- Interview --}}
        <div class="rounded-xl border border-blue-200 bg-blue-50 p-4 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
            <div class="flex items-center justify-between">
                <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-blue-600 text-white">
                    <x-heroicon-o-microphone class="h-5 w-5" />
                </div>

                <span class="text-2xl font-bold text-blue-700">
                    4
                </span>
            </div>

            <div class="mt-4">
                <p class="font-semibold text-blue-800">
                    Interview
                </p>

                <p class="mt-1 text-xs text-blue-600">
                    Active conversations
                </p>
            </div>

            <div class="mt-4 h-2 overflow-hidden rounded-full bg-blue-100">
                <div class="h-full w-[17%] rounded-full bg-blue-600"></div>
            </div>

            <p class="mt-2 text-xs font-semibold text-blue-600">
                17% of pipeline
            </p>
        </div>

        {{-- Test --}}
        <div class="rounded-xl border border-slate-200 bg-slate-50 p-4 transition hover:-translate-y-1 hover:bg-white hover:shadow-sm">
            <div class="flex items-center justify-between">
                <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-amber-100 text-amber-700">
                    <x-heroicon-o-clipboard-document-check class="h-5 w-5" />
                </div>

                <span class="text-2xl font-bold text-slate-950">
                    2
                </span>
            </div>

            <div class="mt-4">
                <p class="font-semibold text-slate-800">
                    Test
                </p>

                <p class="mt-1 text-xs text-slate-500">
                    Assessment stage
                </p>
            </div>

            <div class="mt-4 h-2 overflow-hidden rounded-full bg-slate-200">
                <div class="h-full w-[8%] rounded-full bg-amber-500"></div>
            </div>

            <p class="mt-2 text-xs font-medium text-slate-500">
                8% of pipeline
            </p>
        </div>

        {{-- Offered --}}
        <div class="rounded-xl border border-slate-200 bg-slate-50 p-4 transition hover:-translate-y-1 hover:bg-white hover:shadow-sm">
            <div class="flex items-center justify-between">
                <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-emerald-100 text-emerald-700">
                    <x-heroicon-o-trophy class="h-5 w-5" />
                </div>

                <span class="text-2xl font-bold text-slate-950">
                    1
                </span>
            </div>

            <div class="mt-4">
                <p class="font-semibold text-slate-800">
                    Offered
                </p>

                <p class="mt-1 text-xs text-slate-500">
                    Offer received
                </p>
            </div>

            <div class="mt-4 h-2 overflow-hidden rounded-full bg-slate-200">
                <div class="h-full w-[4%] rounded-full bg-emerald-500"></div>
            </div>

            <p class="mt-2 text-xs font-medium text-slate-500">
                4% of pipeline
            </p>
        </div>
    </div>
</section>