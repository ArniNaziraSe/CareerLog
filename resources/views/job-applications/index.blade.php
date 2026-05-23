<x-layouts.app-dashboard title="Applications">
    <div
        x-data="{
            showCreateModal: false,
            showDetailModal: false,
            showEditModal: false,
            openMenu: null,

            selectedApplication: {
                company: '',
                companyLocation: '',
                position: '',
                status: '',
                roleCategory: '',
                source: '',
                salary: '',
                workModel: '',
                appliedDate: '',
                nextInterview: '',
                contactPerson: '',
                notes: ''
            },

            openDetail(application) {
                this.selectedApplication = application;
                this.showDetailModal = true;
                this.openMenu = null;
            },

            openEdit(application) {
                this.selectedApplication = application;
                this.showEditModal = true;
                this.openMenu = null;
            }
        }"
    >
        {{-- Page Header --}}
        <section class="mb-6 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <h2 class="text-3xl font-bold tracking-tight text-slate-950">
                    Applications
                </h2>

                <p class="mt-1 text-sm text-slate-600">
                    Track every job you applied for.
                </p>
            </div>

            <button
                type="button"
                @click="showCreateModal = true"
                class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-700"
            >
                <x-heroicon-o-plus class="h-4 w-4" />
                Add Application
            </button>
        </section>

        {{-- Filter Card --}}
        <section class="mb-6 rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
            <form class="grid gap-3 lg:grid-cols-4">
                <div class="relative lg:col-span-2">
                    <x-heroicon-o-magnifying-glass class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" />

                    <input
                        type="text"
                        placeholder="Search position or company..."
                        class="w-full rounded-lg border border-slate-200 bg-white py-2.5 pl-10 pr-4 text-sm text-slate-700 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                    >
                </div>

                <select
                    class="rounded-lg border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-700 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                >
                    <option>All Statuses</option>
                    <option>Applied</option>
                    <option>Screening</option>
                    <option>Interview</option>
                    <option>Test</option>
                    <option>Offered</option>
                    <option>Accepted</option>
                    <option>Rejected</option>
                </select>

                <select
                    class="rounded-lg border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-700 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                >
                    <option>Work Model</option>
                    <option>Remote</option>
                    <option>Hybrid</option>
                    <option>On-site</option>
                    <option>Full Time</option>
                    <option>Part Time</option>
                    <option>Internship</option>
                    <option>Contract</option>
                </select>
            </form>
        </section>

        {{-- Applications Table --}}
        <section class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[860px] text-left text-sm">
                    <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                        <tr>
                            <th class="px-6 py-4 font-semibold">Company</th>
                            <th class="px-6 py-4 font-semibold">Position</th>
                            <th class="px-6 py-4 font-semibold">Status</th>
                            <th class="px-6 py-4 font-semibold">Source</th>
                            <th class="px-6 py-4 font-semibold">Salary</th>
                            <th class="px-6 py-4 font-semibold">Work Model</th>
                            <th class="px-6 py-4 font-semibold">Applied Date</th>
                            <th class="px-6 py-4 font-semibold text-right">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-200">
                        <tr class="hover:bg-slate-50">
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-9 w-9 items-center justify-center rounded bg-blue-50 font-bold text-blue-700">
                                        S
                                    </div>

                                    <p class="font-bold text-slate-950">
                                        Stripe
                                    </p>
                                </div>
                            </td>

                            <td class="px-6 py-5 text-slate-700">
                                Frontend Engineer
                            </td>

                            <td class="px-6 py-5">
                                <span class="rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700">
                                    Applied
                                </span>
                            </td>

                            <td class="px-6 py-5 text-slate-600">
                                LinkedIn
                            </td>

                            <td class="px-6 py-5 text-slate-600">
                                $140k - $160k
                            </td>

                            <td class="px-6 py-5">
                                <span class="inline-flex items-center gap-1 text-xs font-medium text-slate-700">
                                    <x-heroicon-o-wifi class="h-4 w-4" />
                                    Remote
                                </span>
                            </td>

                            <td class="px-6 py-5 text-slate-600">
                                Oct 24, 2023
                            </td>

                            <td class="px-6 py-5 text-right">
                                <button class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-slate-900">
                                    <x-heroicon-o-ellipsis-horizontal class="h-5 w-5" />
                                </button>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50">
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-9 w-9 items-center justify-center rounded bg-blue-50 font-bold text-blue-700">
                                        V
                                    </div>

                                    <p class="font-bold text-slate-950">
                                        Vercel
                                    </p>
                                </div>
                            </td>

                            <td class="px-6 py-5 text-slate-700">
                                Senior UX Designer
                            </td>

                            <td class="px-6 py-5">
                                <span class="rounded-full bg-violet-100 px-3 py-1 text-xs font-semibold text-violet-700">
                                    Screening
                                </span>
                            </td>

                            <td class="px-6 py-5 text-slate-600">
                                Careers Page
                            </td>

                            <td class="px-6 py-5 text-slate-600">
                                $150k+
                            </td>

                            <td class="px-6 py-5">
                                <span class="inline-flex items-center gap-1 text-xs font-medium text-slate-700">
                                    <x-heroicon-o-building-office-2 class="h-4 w-4" />
                                    Hybrid
                                </span>
                            </td>

                            <td class="px-6 py-5 text-slate-600">
                                Oct 20, 2023
                            </td>

                            <td class="relative px-6 py-5 text-right">
                                <button
                                    type="button"
                                    @click="openMenu === 2 ? openMenu = null : openMenu = 2"
                                    class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-slate-900"
                                >
                                    <x-heroicon-o-ellipsis-horizontal class="h-5 w-5" />
                                </button>

                                <div
                                    x-show="openMenu === 2"
                                    x-cloak
                                    @click.away="openMenu = null"
                                    class="absolute right-6 top-12 z-20 w-40 overflow-hidden rounded-lg border border-slate-200 bg-white text-left shadow-lg"
                                >
                                    <button
                                        type="button"
                                        @click="openDetail({
                                            company: 'Vercel',
                                            companyLocation: 'Remote',
                                            position: 'Senior UX Designer',
                                            status: 'Screening',
                                            roleCategory: 'Design & UX',
                                            source: 'Careers Page',
                                            salary: '$150k+',
                                            workModel: 'Hybrid',
                                            appliedDate: '2023-10-24',
                                            nextInterview: 'Nov 15, 10:00 AM',
                                            contactPerson: 'Jane Doe',
                                            notes: 'Screening call scheduled with recruiter. Prepare portfolio highlights and product design case studies.'
                                        })"
                                        class="flex w-full items-center gap-2 px-4 py-2.5 text-sm text-slate-700 hover:bg-slate-100"
                                    >
                                        <x-heroicon-o-eye class="h-4 w-4" />
                                        Show Detail
                                    </button>

                                    <button
                                        type="button"
                                        @click="openEdit({
                                            company: 'Stripe',
                                            companyLocation: 'San Francisco, CA',
                                            position: 'Frontend Engineer',
                                            status: 'Applied',
                                            roleCategory: 'Engineering',
                                            source: 'LinkedIn',
                                            salary: '$140k - $160k',
                                            workModel: 'Remote',
                                            appliedDate: '2023-10-24',
                                            nextInterview: '',
                                            contactPerson: 'Jane Doe',
                                            notes: 'Resume and portfolio submitted via LinkedIn. Waiting for recruiter response.'
                                        })"
                                        class="flex w-full items-center gap-2 px-4 py-2.5 text-sm text-slate-700 hover:bg-slate-100"
                                    >
                                        <x-heroicon-o-pencil-square class="h-4 w-4" />
                                        Edit
                                    </button>

                                    <button
                                        type="button"
                                        class="flex w-full items-center gap-2 px-4 py-2.5 text-sm text-red-600 hover:bg-red-50"
                                    >
                                        <x-heroicon-o-trash class="h-4 w-4" />
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50">
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-9 w-9 items-center justify-center rounded bg-blue-50 font-bold text-blue-700">
                                        A
                                    </div>

                                    <p class="font-bold text-slate-950">
                                        Airbnb
                                    </p>
                                </div>
                            </td>

                            <td class="px-6 py-5 text-slate-700">
                                Product Manager
                            </td>

                            <td class="px-6 py-5">
                                <span class="rounded-full bg-orange-100 px-3 py-1 text-xs font-semibold text-orange-700">
                                    Interview
                                </span>
                            </td>

                            <td class="px-6 py-5 text-slate-600">
                                Referral
                            </td>

                            <td class="px-6 py-5 text-slate-600">
                                -
                            </td>

                            <td class="px-6 py-5">
                                <span class="inline-flex items-center gap-1 text-xs font-medium text-slate-700">
                                    <x-heroicon-o-building-office class="h-4 w-4" />
                                    On-site
                                </span>
                            </td>

                            <td class="px-6 py-5 text-slate-600">
                                Oct 15, 2023
                            </td>

                            <td class="px-6 py-5 text-right">
                                <button class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-slate-900">
                                    <x-heroicon-o-ellipsis-horizontal class="h-5 w-5" />
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Footer --}}
            <div class="flex items-center justify-between border-t border-slate-200 px-6 py-4">
                <p class="text-sm text-slate-600">
                    Showing 1 to 3 of 21 applications
                </p>

                <div class="flex items-center gap-2">
                    <button class="rounded-lg border border-slate-200 px-4 py-2 text-sm text-slate-500 hover:bg-slate-100">
                        Previous
                    </button>

                    <button class="rounded-lg border border-slate-200 px-4 py-2 text-sm font-medium text-slate-800 hover:bg-slate-100">
                        Next
                    </button>
                </div>
            </div>
        </section>

        @include('job-applications.create')
        @include('job-applications.show')
        @include('job-applications.edit')
    </div>
</x-layouts.app-dashboard>