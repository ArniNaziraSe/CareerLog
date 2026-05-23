<div
    x-show="showEditModal"
    x-cloak
    class="fixed inset-y-0 right-0 left-0 z-30 overflow-y-auto bg-slate-900/20 px-4 py-6 md:left-64"
>
    <div class="flex min-h-full items-start justify-center">
        <div
            @click.away="showEditModal = false"
            class="w-full max-w-4xl overflow-hidden rounded-xl border border-slate-200 bg-white shadow-xl"
        >
            {{-- Modal Header --}}
            <div class="border-b border-slate-200 px-6 py-5">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <h3 class="text-3xl font-bold tracking-tight text-slate-950">
                            Edit Application
                        </h3>

                        <p class="mt-2 text-sm text-slate-600">
                            Update this job application information.
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

                {{-- Form Body --}}
                <div class="max-h-[65vh] space-y-5 overflow-y-auto px-6 py-6">
                    <div class="grid gap-5 md:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-700">
                                Company <span class="text-red-500">*</span>
                            </label>

                            <select
                                name="company_id"
                                x-model="selectedApplication.company"
                                class="w-full rounded-lg border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                            >
                                <option value="">Select a company</option>
                                <option value="Stripe">Stripe</option>
                                <option value="Vercel">Vercel</option>
                                <option value="Airbnb">Airbnb</option>
                            </select>
                        </div>

                        <div>
                            <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-700">
                                Position Title <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="text"
                                name="position"
                                x-model="selectedApplication.position"
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
                                x-model="selectedApplication.appliedDate"
                                class="w-full rounded-lg border border-slate-200 px-4 py-3 text-sm text-slate-700 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                            >
                        </div>

                        <div>
                            <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-700">
                                Status
                            </label>

                            <select
                                name="status"
                                x-model="selectedApplication.status"
                                class="w-full rounded-lg border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                            >
                                <option value="Applied">Applied</option>
                                <option value="Screening">Screening</option>
                                <option value="Interview">Interview</option>
                                <option value="Test">Test</option>
                                <option value="Offered">Offered</option>
                                <option value="Accepted">Accepted</option>
                                <option value="Rejected">Rejected</option>
                            </select>
                        </div>

                        <div>
                            <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-700">
                                Application Source
                            </label>

                            <input
                                type="text"
                                name="source"
                                x-model="selectedApplication.source"
                                placeholder="e.g. LinkedIn, Company Site, Referral"
                                class="w-full rounded-lg border border-slate-200 px-4 py-3 text-sm text-slate-700 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                            >
                        </div>

                        <div>
                            <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-700">
                                Expected/Posted Salary
                            </label>

                            <input
                                type="text"
                                name="salary"
                                x-model="selectedApplication.salary"
                                placeholder="e.g. $140k - $160k"
                                class="w-full rounded-lg border border-slate-200 px-4 py-3 text-sm text-slate-700 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                            >
                        </div>

                        <div>
                            <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-700">
                                Work Model
                            </label>

                            <select
                                name="work_model"
                                x-model="selectedApplication.workModel"
                                class="w-full rounded-lg border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                            >
                                <option value="Remote">Remote</option>
                                <option value="Hybrid">Hybrid</option>
                                <option value="On-site">On-site</option>
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                                <option value="Internship">Internship</option>
                                <option value="Contract">Contract</option>
                            </select>
                        </div>

                        <div>
                            <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-700">
                                Next Interview Date
                            </label>

                            <input
                                type="date"
                                name="interview_date"
                                x-model="selectedApplication.nextInterview"
                                class="w-full rounded-lg border border-slate-200 px-4 py-3 text-sm text-slate-700 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                            >
                        </div>

                        <div>
                            <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-700">
                                Role Category
                            </label>

                            <input
                                type="text"
                                name="role_category"
                                x-model="selectedApplication.roleCategory"
                                placeholder="e.g. Design & UX"
                                class="w-full rounded-lg border border-slate-200 px-4 py-3 text-sm text-slate-700 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                            >
                        </div>

                        <div>
                            <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-700">
                                Contact Person
                            </label>

                            <input
                                type="text"
                                name="contact_person"
                                x-model="selectedApplication.contactPerson"
                                placeholder="e.g. Jane Doe"
                                class="w-full rounded-lg border border-slate-200 px-4 py-3 text-sm text-slate-700 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
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
                            x-model="selectedApplication.notes"
                            placeholder="Add any details about the role, interviewers, or specific requirements..."
                            class="w-full rounded-lg border border-slate-200 px-4 py-3 text-sm text-slate-700 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                        ></textarea>
                    </div>
                </div>

                {{-- Footer --}}
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
                        class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-blue-700"
                    >
                        <x-heroicon-o-check class="h-4 w-4" />
                        Update Application
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>