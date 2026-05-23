<div
    x-show="showEditModal"
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
                        <h3 class="text-2xl font-bold text-slate-950">
                            Edit Company
                        </h3>

                        <p class="mt-1 text-sm text-slate-600">
                            Update company information in your career log.
                        </p>
                    </div>

                    <button
                        type="button"
                        @click="showEditModal = false"
                        class="rounded-lg p-2 text-slate-400 hover:bg-slate-100 hover:text-slate-700"
                    >
                        <x-heroicon-o-x-mark class="h-5 w-5" />
                    </button>
                </div>
            </div>

            <form action="#" method="POST">
                @csrf
                @method('PUT')

                <div class="max-h-[65vh] space-y-4 overflow-y-auto px-5 py-5">
                    <div>
                        <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-700">
                            Company Name <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="text"
                            name="name"
                            x-model="selectedCompany.name"
                            class="w-full rounded-lg border border-slate-200 px-4 py-3 text-sm text-slate-700 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                        >
                    </div>

                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-700">
                                Website
                            </label>

                            <input
                                type="text"
                                name="website"
                                x-model="selectedCompany.website"
                                class="w-full rounded-lg border border-slate-200 px-4 py-3 text-sm text-slate-700 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                            >
                        </div>

                        <div>
                            <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-700">
                                Contact Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                x-model="selectedCompany.email"
                                class="w-full rounded-lg border border-slate-200 px-4 py-3 text-sm text-slate-700 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                            >
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-700">
                            Address
                        </label>

                        <input
                            type="text"
                            name="address"
                            x-model="selectedCompany.address"
                            class="w-full rounded-lg border border-slate-200 px-4 py-3 text-sm text-slate-700 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                        >
                    </div>

                    <div>
                        <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-700">
                            Notes
                        </label>

                        <textarea
                            name="notes"
                            rows="5"
                            x-model="selectedCompany.notes"
                            class="w-full rounded-lg border border-slate-200 px-4 py-3 text-sm text-slate-700 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                        ></textarea>
                    </div>
                </div>

                <div class="flex justify-end gap-3 border-t border-slate-200 px-6 py-5">
                    <button
                        type="button"
                        @click="showEditModal = false"
                        class="rounded-lg border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-100"
                    >
                        Cancel
                    </button>

                    <button
                        type="submit"
                        class="rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-blue-700"
                    >
                        Update Company
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>