<div
    x-show="showDetailModal"
    x-cloak
    class="fixed inset-y-0 right-0 left-0 z-30 overflow-y-auto bg-slate-900/20 px-4 py-6 md:left-64"
>
    <div class="flex min-h-full items-start justify-center">
        <div
            @click.away="showDetailModal = false"
            class="w-full max-w-5xl overflow-hidden rounded-xl border border-slate-200 bg-slate-50 shadow-xl"
        >
            {{-- Modal Header --}}
            <div class="border-b border-slate-200 bg-slate-50 px-6 py-5">
                <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
                    <div>
                        <div class="flex flex-wrap items-center gap-3">
                            <h3
                                class="text-2xl font-bold tracking-tight text-slate-950"
                                x-text="selectedApplication.position"
                            >
                                Senior Product Designer
                            </h3>

                            <span
                                class="rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700"
                                x-text="selectedApplication.status"
                            >
                                Interview
                            </span>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <button
                            type="button"
                            @click="showDetailModal = false; showEditModal = true"
                            class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-100"
                        >
                            <x-heroicon-o-pencil-square class="h-4 w-4" />
                            Edit
                        </button>

                        <button
                            type="button"
                            class="inline-flex items-center gap-2 rounded-lg px-4 py-2 text-sm font-semibold text-red-600 hover:bg-red-50"
                        >
                            <x-heroicon-o-trash class="h-4 w-4" />
                            Delete
                        </button>

                        <button
                            type="button"
                            @click="showDetailModal = false"
                            class="rounded-lg p-2 text-slate-400 hover:bg-slate-100 hover:text-slate-700"
                        >
                            <x-heroicon-o-x-mark class="h-5 w-5" />
                        </button>
                    </div>
                </div>
            </div>

            {{-- Modal Body --}}
            <div class="max-h-[75vh] overflow-y-auto px-6 py-6">
                <div class="grid gap-6 xl:grid-cols-3">
                    {{-- Left Content --}}
                    <div class="space-y-6 xl:col-span-2">
                        {{-- Company Summary --}}
                        <section class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
                            <div class="grid gap-4 sm:grid-cols-[1fr_auto]">
                                <div class="flex items-center gap-4 px-6 py-5">
                                    <div class="flex h-16 w-16 items-center justify-center rounded-lg bg-blue-50 text-blue-700">
                                        <x-heroicon-o-building-office-2 class="h-8 w-8" />
                                    </div>

                                    <div>
                                        <h4
                                            class="text-lg font-bold text-slate-950"
                                            x-text="selectedApplication.company"
                                        >
                                            Acme Corporation
                                        </h4>

                                        <p class="mt-1 flex items-center gap-1 text-sm text-slate-600">
                                            <x-heroicon-o-map-pin class="h-4 w-4" />
                                            <span x-text="selectedApplication.companyLocation">
                                                San Francisco, CA
                                            </span>

                                            <span>
                                                (
                                            </span>

                                            <span x-text="selectedApplication.workModel">
                                                Hybrid
                                            </span>

                                            <span>
                                                )
                                            </span>
                                        </p>
                                    </div>
                                </div>

                                <div class="border-t border-slate-200 px-6 py-5 sm:border-l sm:border-t-0">
                                    <p class="text-xs text-slate-500">
                                        Applied
                                    </p>

                                    <p
                                        class="mt-1 text-lg font-bold text-slate-950"
                                        x-text="selectedApplication.appliedDate"
                                    >
                                        Oct 24, 2023
                                    </p>
                                </div>
                            </div>
                        </section>

                        {{-- Application Details --}}
                        <section class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
                            <div class="flex items-center gap-2 border-b border-slate-200 px-6 py-4">
                                <x-heroicon-o-information-circle class="h-5 w-5 text-blue-600" />

                                <h4 class="text-lg font-bold text-slate-950">
                                    Application Details
                                </h4>
                            </div>

                            <div class="grid gap-6 px-6 py-5 sm:grid-cols-2">
                                <div>
                                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Role Category
                                    </p>

                                    <p
                                        class="mt-2 font-semibold text-slate-950"
                                        x-text="selectedApplication.roleCategory"
                                    >
                                        Design & UX
                                    </p>
                                </div>

                                <div>
                                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Source
                                    </p>

                                    <p class="mt-2 font-semibold text-slate-950">
                                        <span x-text="selectedApplication.source">
                                            LinkedIn
                                        </span>
                                    </p>
                                </div>

                                <div>
                                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Salary Expectation
                                    </p>

                                    <p
                                        class="mt-2 font-semibold text-slate-950"
                                        x-text="selectedApplication.salary"
                                    >
                                        $140k - $160k
                                    </p>
                                </div>

                                <div>
                                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Work Model
                                    </p>

                                    <p
                                        class="mt-2 font-semibold text-slate-950"
                                        x-text="selectedApplication.workModel"
                                    >
                                        Hybrid
                                    </p>
                                </div>

                                <div>
                                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Next Interview
                                    </p>

                                    <p class="mt-2 flex items-center gap-2 font-semibold text-blue-700">
                                        <x-heroicon-o-calendar-days class="h-4 w-4" />
                                        <span x-text="selectedApplication.nextInterview">
                                            Nov 15, 10:00 AM
                                        </span>
                                    </p>
                                </div>

                                <div>
                                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Contact Person
                                    </p>

                                    <p
                                        class="mt-2 font-semibold text-slate-950"
                                        x-text="selectedApplication.contactPerson"
                                    >
                                        Jane Doe
                                    </p>
                                </div>
                            </div>
                        </section>

                        {{-- Personal Notes --}}
                        <section class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
                            <div class="flex items-center justify-between border-b border-slate-200 px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <x-heroicon-o-bars-3-bottom-left class="h-5 w-5 text-violet-600" />

                                    <h4 class="text-lg font-bold text-slate-950">
                                        Personal Notes
                                    </h4>
                                </div>

                                <x-heroicon-o-pencil-square class="h-5 w-5 text-slate-400" />
                            </div>

                            <div class="px-6 py-5">
                                <p
                                    class="text-sm leading-6 text-slate-700"
                                    x-text="selectedApplication.notes"
                                >
                                    Had a great initial call with Jane.
                                </p>
                            </div>
                        </section>
                    </div>

                    {{-- Timeline --}}
                    <aside class="rounded-xl border border-slate-200 bg-white shadow-sm">
                        <div class="border-b border-slate-200 px-6 py-4">
                            <h4 class="text-lg font-bold text-slate-950">
                                Application Timeline
                            </h4>
                        </div>

                        <div class="px-6 py-5">
                            <div class="relative space-y-7">
                                <div class="absolute left-[9px] top-3 h-[calc(100%-24px)] w-px bg-slate-200"></div>

                                <div class="relative flex gap-4">
                                    <div class="relative z-10 flex h-5 w-5 items-center justify-center rounded-full bg-blue-600 text-white">
                                        <x-heroicon-o-check class="h-3 w-3" />
                                    </div>

                                    <div>
                                        <p class="font-bold text-slate-950">
                                            Applied
                                        </p>

                                        <p class="mt-1 text-sm text-slate-600">
                                            Resume and portfolio submitted via company portal.
                                        </p>

                                        <p class="mt-1 text-xs text-slate-400">
                                            Oct 24, 2023
                                        </p>
                                    </div>
                                </div>

                                <div class="relative flex gap-4">
                                    <div class="relative z-10 flex h-5 w-5 items-center justify-center rounded-full bg-blue-600 text-white">
                                        <x-heroicon-o-check class="h-3 w-3" />
                                    </div>

                                    <div>
                                        <p class="font-bold text-slate-950">
                                            Screening Call
                                        </p>

                                        <p class="mt-1 text-sm text-slate-600">
                                            30-min chat with recruiter.
                                        </p>

                                        <p class="mt-1 text-xs text-slate-400">
                                            Nov 2, 2023
                                        </p>
                                    </div>
                                </div>

                                <div class="relative flex gap-4">
                                    <div class="relative z-10 flex h-5 w-5 items-center justify-center rounded-full border-4 border-blue-100 bg-blue-600"></div>

                                    <div class="rounded-lg border border-blue-100 bg-blue-50 px-4 py-3">
                                        <p class="font-bold text-blue-700">
                                            Technical Interview
                                        </p>

                                        <p class="mt-1 text-sm text-slate-600">
                                            Portfolio review with Hiring Manager.
                                        </p>

                                        <p class="mt-1 text-xs font-medium text-blue-700">
                                            Scheduled: Nov 15
                                        </p>
                                    </div>
                                </div>

                                <div class="relative flex gap-4 opacity-50">
                                    <div class="relative z-10 h-5 w-5 rounded-full border border-slate-300 bg-white"></div>

                                    <div>
                                        <p class="font-bold text-slate-700">
                                            Design Challenge
                                        </p>

                                        <p class="mt-1 text-sm text-slate-500">
                                            Take-home assignment
                                        </p>
                                    </div>
                                </div>

                                <div class="relative flex gap-4 opacity-50">
                                    <div class="relative z-10 h-5 w-5 rounded-full border border-slate-300 bg-white"></div>

                                    <div>
                                        <p class="font-bold text-slate-700">
                                            Final Result
                                        </p>

                                        <p class="mt-1 text-sm text-slate-500">
                                            Offer or Rejection
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-7 border-t border-slate-200 pt-5">
                                <button class="inline-flex w-full items-center justify-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-100">
                                    <x-heroicon-o-arrow-path class="h-4 w-4" />
                                    Update Status
                                </button>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>