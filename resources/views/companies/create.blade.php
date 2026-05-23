<div
    x-show="showCreateModal"
    x-cloak
    class="fixed inset-y-0 right-0 left-0 z-30 overflow-y-auto bg-slate-900/20 px-4 py-6 md:left-64"
>
    <div class="flex min-h-full items-start justify-center">
        <div
            @click.away="showCreateModal = false"
            class="w-full max-w-xl overflow-hidden rounded-xl border border-slate-200 bg-white shadow-xl"
        >
            {{-- Modal Header --}}
            <div class="border-b border-slate-200 px-6 py-5">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <h3 class="text-2xl font-bold text-slate-950">
                            Add Company
                        </h3>

                        <p class="mt-1 text-sm text-slate-600">
                            Enter details for a new company to track in your log.
                        </p>
                    </div>

                    <button
                        type="button"
                        @click="showCreateModal = false"
                        class="rounded-lg p-2 text-slate-400 hover:bg-slate-100 hover:text-slate-700"
                    >
                        <x-heroicon-o-x-mark class="h-5 w-5" />
                    </button>
                </div>
            </div>

            {{-- Modal Body --}}
            <form action="#" method="POST">
                @csrf

                <div class="max-h-[65vh] space-y-4 overflow-y-auto px-5 py-5">
                    <div>
                        <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-700">
                            Company Name <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="text"
                            name="name"
                            placeholder="e.g. Acme Corp"
                            class="w-full rounded-lg border border-slate-200 px-4 py-3 text-sm text-slate-700 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
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
                                placeholder="https://"
                                class="w-full rounded-lg border border-slate-200 px-4 py-3 text-sm text-slate-700 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                            >
                        </div>

                        <div>
                            <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-700">
                                Contact Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                placeholder="contact@company.com"
                                class="w-full rounded-lg border border-slate-200 px-4 py-3 text-sm text-slate-700 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
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
                            placeholder="HQ Location"
                            class="w-full rounded-lg border border-slate-200 px-4 py-3 text-sm text-slate-700 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                        >
                    </div>

                    <div>
                        <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-700">
                            Notes
                        </label>

                        <textarea
                            name="notes"
                            rows="5"
                            placeholder="Any initial thoughts or connections..."
                            class="w-full rounded-lg border border-slate-200 px-4 py-3 text-sm text-slate-700 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                        ></textarea>
                    </div>
                </div>

                {{-- Modal Footer --}}
                <div class="flex justify-end gap-3 border-t border-slate-200 px-6 py-5">
                    <button
                        type="button"
                        @click="showCreateModal = false"
                        class="rounded-lg border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-100"
                    >
                        Cancel
                    </button>

                    <button
                        type="submit"
                        class="rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-blue-700"
                    >
                        Save Company
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>