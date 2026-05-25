<div
    x-show="showCreateModal"
    x-cloak
    class="fixed inset-y-0 right-0 left-0 z-30 overflow-y-auto bg-slate-900/20 px-4 py-6 lg:left-64"
>
    <div class="flex min-h-full items-start justify-center">
        <div
            @click.away="showCreateModal = false"
            class="w-full max-w-4xl overflow-hidden rounded-xl border border-slate-200 bg-white shadow-xl"
        >
            {{-- Modal Header --}}
            <div class="border-b border-slate-200 px-6 py-5">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <h3 class="text-3xl font-bold tracking-tight text-slate-950">
                            Add Application
                        </h3>

                        <p class="mt-2 text-sm text-slate-600">
                            Log a new job application to track its progress.
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

            <form action="{{ route('job-applications.store') }}" method="POST">
                @csrf

                {{-- Form Body --}}
                <div class="max-h-[65vh] space-y-5 overflow-y-auto px-6 py-6">
                    <div class="grid gap-5 md:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-700">
                                Company <span class="text-red-500">*</span>
                            </label>

                            <select
                                name="company_id"
                                required
                                class="w-full rounded-lg border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                            >
                                <option value="">Select a company</option>

                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}" @selected(old('company_id') == $company->id)>
                                        {{ $company->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-700">
                                Position Title <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="text"
                                name="position"
                                placeholder="e.g. Senior Product Designer"
                                class="w-full rounded-lg border border-slate-200 px-4 py-3 text-sm text-slate-700 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                            >
                        </div>

                        <div>
                            <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-700">
                                Applied Date <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="date"
                                name="applied_date"
                                class="w-full rounded-lg border border-slate-200 px-4 py-3 text-sm text-slate-700 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                            >
                        </div>

                        <div>
                            <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-700">
                                Status
                            </label>

                            <select
                                name="status"
                                class="w-full rounded-lg border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                            >
                                <option value="applied">Applied</option>
                                <option value="screening">Screening</option>
                                <option value="interview">Interview</option>
                                <option value="test">Test</option>
                                <option value="offered">Offered</option>
                                <option value="accepted">Accepted</option>
                                <option value="rejected">Rejected</option>
                                <option value="ghosted">Ghosted</option>
                            </select>
                        </div>

                        <div>
                            <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-700">
                                Application Source
                            </label>

                            <input
                                type="text"
                                name="source"
                                placeholder="e.g. LinkedIn, Company Site, Referral"
                                class="w-full rounded-lg border border-slate-200 px-4 py-3 text-sm text-slate-700 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                            >
                        </div>

                        <div>
                            <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-700">
                                Expected/Posted Salary
                            </label>

                            <input
                                type="number"
                                name="salary"
                                value="{{ old('salary') }}"
                                placeholder="e.g. 5000000"
                                class="w-full rounded-lg border border-slate-200 px-4 py-3 text-sm text-slate-700 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                            >
                        </div>

                        <div>
                            <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-700">
                                Work Model
                            </label>

                            <select
                                name="work_model"
                                class="w-full rounded-lg border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                            >
                                <option value="remote">Remote</option>
                                <option value="hybrid">Hybrid</option>
                                <option value="onsite">On-site</option>
                                <option value="full_time">Full Time</option>
                                <option value="part_time">Part Time</option>
                                <option value="internship">Internship</option>
                                <option value="contract">Contract</option>
                            </select>
                        </div>

                        <div>
                            <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-700">
                                Next Interview Date
                            </label>

                            <input
                                type="date"
                                name="interview_date"
                                class="w-full rounded-lg border border-slate-200 px-4 py-3 text-sm text-slate-700 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                            >
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-700">
                            Notes
                        </label>

                        <textarea
                            name="notes"
                            rows="4"
                            placeholder="Add any details about the role, interviewers, or specific requirements..."
                            class="w-full rounded-lg border border-slate-200 px-4 py-3 text-sm text-slate-700 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                        ></textarea>
                    </div>
                </div>

                {{-- Footer --}}
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
                        class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-blue-700"
                    >
                        <x-heroicon-o-bookmark-square class="h-4 w-4" />
                        Save Application
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>