<div
    x-show="showDetailModal"
    x-cloak
    class="fixed inset-y-0 right-0 left-0 z-30 overflow-y-auto bg-slate-900/20 px-4 py-6 md:left-64"
>
    <div class="flex min-h-full items-start justify-center">
        <div
            @click.away="showCreateModal = false"
            class="w-full max-w-xl overflow-hidden rounded-xl border border-slate-200 bg-white shadow-xl"
        >
            <div class="border-b border-slate-200 px-6 py-5">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <h3 class="text-2xl font-bold text-slate-950" x-text="selectedCompany.name">
                            Company Detail
                        </h3>

                        <p class="mt-1 text-sm text-slate-600">
                            Company information and application summary.
                        </p>
                    </div>

                    <button
                        type="button"
                        @click="showDetailModal = false"
                        class="rounded-lg p-2 text-slate-400 hover:bg-slate-100 hover:text-slate-700"
                    >
                        <x-heroicon-o-x-mark class="h-5 w-5" />
                    </button>
                </div>
            </div>

            <div class="max-h-[65vh] space-y-4 overflow-y-auto px-5 py-5">
                <div class="grid gap-5 sm:grid-cols-2">
                    <div class="rounded-lg border border-slate-200 bg-slate-50 p-4">
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-500">
                            Website
                        </p>

                        <p class="mt-2 font-semibold text-blue-700" x-text="selectedCompany.website">
                            -
                        </p>
                    </div>

                    <div class="rounded-lg border border-slate-200 bg-slate-50 p-4">
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-500">
                            Email
                        </p>

                        <p class="mt-2 font-semibold text-slate-900" x-text="selectedCompany.email">
                            -
                        </p>
                    </div>

                    <div class="rounded-lg border border-slate-200 bg-slate-50 p-4">
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-500">
                            Address
                        </p>

                        <p class="mt-2 font-semibold text-slate-900" x-text="selectedCompany.address">
                            -
                        </p>
                    </div>

                    <div class="rounded-lg border border-slate-200 bg-slate-50 p-4">
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-500">
                            Total Applications
                        </p>

                        <p class="mt-2 text-2xl font-bold text-slate-950" x-text="selectedCompany.totalApps">
                            0
                        </p>
                    </div>
                </div>

                <div class="rounded-lg border border-slate-200 bg-slate-50 p-4">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500">
                        Notes
                    </p>

                    <p class="mt-2 text-sm leading-6 text-slate-700" x-text="selectedCompany.notes">
                        -
                    </p>
                </div>
            </div>

            <div class="flex justify-end gap-3 border-t border-slate-200 px-6 py-5">
                <button
                    type="button"
                    @click="showDetailModal = false"
                    class="rounded-lg border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-100"
                >
                    Close
                </button>

                <button
                    type="button"
                    @click="showDetailModal = false; showEditModal = true"
                    class="rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-blue-700"
                >
                    Edit Company
                </button>
            </div>
        </div>
    </div>
</div>