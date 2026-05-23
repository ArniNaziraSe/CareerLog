<x-layouts.app-dashboard title="Companies">
    <div
        x-data="{
            showCreateModal: false,
            showEditModal: false,
            showDetailModal: false,

            selectedCompany: {
                name: '',
                website: '',
                email: '',
                address: '',
                notes: '',
            },

            openDetail(company) {
                this.selectedCompany = company;
                this.showDetailModal = true;
            },

            openEdit(company) {
                this.selectedCompany = company;
                this.showEditModal = true;
            }
        }"
    >
        {{-- Page Header --}}
        <section class="mb-6 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <h2 class="text-3xl font-bold tracking-tight text-slate-950">
                    Companies
                </h2>

                <p class="mt-1 text-sm text-slate-600">
                    Manage companies you have applied to.
                </p>
            </div>

            <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                {{-- Search Bar --}}
                <div class="relative w-full sm:w-72">
                    <x-heroicon-o-magnifying-glass class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" />

                    <input
                        type="text"
                        placeholder="Search company..."
                        class="w-full rounded-lg border border-slate-200 bg-white py-2.5 pl-10 pr-4 text-sm text-slate-700 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                    >
                </div>

                {{-- Add Company Button --}}
                <button
                    type="button"
                    @click="showCreateModal = true"
                    class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-700"
                >
                    <x-heroicon-o-plus class="h-4 w-4" />
                    Add Company
                </button>
            </div>
        </section>

        {{-- Companies Table Card --}}
        <section class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[820px] text-center text-sm">
                    <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500 text-center font-extrabold">
                        <tr>
                            <th class="px-6 py-4 font-semibold">Company Name</th>
                            <th class="px-6 py-4 font-semibold">Website</th>
                            <th class="px-6 py-4 font-semibold">Email</th>
                            <th class="px-6 py-4 font-semibold">Address</th>
                            <th class="px-6 py-4 font-semibold">Notes</th>
                            <th class="px-6 py-4 font-semibold">Action</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-200">
                        {{-- Row 1 --}}
                        <tr class="hover:bg-slate-50">
                            <td class="px-6 py-5">
                                <p class="font-bold text-slate-950">Acme Corp</p>
                            </td>

                            <td class="px-6 py-5">
                                <a href="#" class="font-medium text-blue-700 hover:text-blue-800">
                                    acme.co
                                </a>
                            </td>

                            <td class="px-6 py-5 text-slate-600">
                                careers@acme.co
                            </td>

                            <td class="px-6 py-5 text-slate-600">
                                123 Innovation Street
                            </td>

                            <td class="px-6 py-5 text-slate-600">
                                Great engineering culture
                            </td>

                            <td class="px-6 py-5 text-right">
                                <div class="flex justify-center gap-2">
                                    <button
                                        type="button"
                                        @click="openDetail({
                                            name: 'Acme Corp',
                                            website: 'acme.co',
                                            email: 'careers@acme.co',
                                            address: '123 Innovation Street',
                                            notes: 'Great engineering culture',
                                        })"
                                        class="rounded-lg border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-100"
                                    >
                                        View
                                    </button>

                                    <button
                                        type="button"
                                        @click="openEdit({
                                            name: 'Acme Corp',
                                            website: 'acme.co',
                                            email: 'careers@acme.co',
                                            address: '123 Innovation Street',
                                            notes: 'Great engineering culture',
                                        })"
                                        class="rounded-lg border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-100"
                                    >
                                        Edit
                                    </button>

                                    <button
                                        type="button"
                                        class="rounded-lg border border-red-200 px-3 py-2 text-xs font-semibold text-red-600 hover:bg-red-50"
                                    >
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>

                        {{-- Row 2 --}}
                        <tr class="hover:bg-slate-50">
                            <td class="px-6 py-5">
                                <p class="font-bold text-slate-950">Globex Inc</p>
                            </td>

                            <td class="px-6 py-5">
                                <a href="#" class="font-medium text-blue-700 hover:text-blue-800">
                                    globex.io
                                </a>
                            </td>

                            <td class="px-6 py-5 text-slate-600">
                                jobs@globex.io
                            </td>

                            <td class="px-6 py-5 text-slate-600">
                                Remote
                            </td>

                            <td class="px-6 py-5 text-slate-600">
                                Waiting on series B funding
                            </td>

                            <td class="px-6 py-5 text-right">
                                <div class="flex justify-center gap-2">
                                    <button
                                        type="button"
                                        @click="openDetail({
                                            name: 'Globex Inc',
                                            website: 'globex.io',
                                            email: 'jobs@globex.io',
                                            address: 'Remote',
                                            notes: 'Waiting on series B funding',
                                        })"
                                        class="rounded-lg border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-100"
                                    >
                                        View
                                    </button>

                                    <button
                                        type="button"
                                        @click="openEdit({
                                            name: 'Globex Inc',
                                            website: 'globex.io',
                                            email: 'jobs@globex.io',
                                            address: 'Remote',
                                            notes: 'Waiting on series B funding',
                                        })"
                                        class="rounded-lg border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-100"
                                    >
                                        Edit
                                    </button>

                                    <button
                                        type="button"
                                        class="rounded-lg border border-red-200 px-3 py-2 text-xs font-semibold text-red-600 hover:bg-red-50"
                                    >
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>

                        {{-- Row 3 --}}
                        <tr class="hover:bg-slate-50">
                            <td class="px-6 py-5">
                                <p class="font-bold text-slate-950">Initech</p>
                            </td>

                            <td class="px-6 py-5">
                                <a href="#" class="font-medium text-blue-700 hover:text-blue-800">
                                    initech.com
                                </a>
                            </td>

                            <td class="px-6 py-5 text-slate-600">
                                hr@initech.com
                            </td>

                            <td class="px-6 py-5 text-slate-600">
                                400 Corporate Drive
                            </td>

                            <td class="px-6 py-5 text-slate-600">
                                Applied for Senior Programmer
                            </td>

                            <td class="px-6 py-5 text-right">
                                <div class="flex justify-center gap-2">
                                    <button
                                        type="button"
                                        @click="openDetail({
                                            name: 'Initech',
                                            website: 'initech.com',
                                            email: 'hr@initech.com',
                                            address: '400 Corporate Drive',
                                            notes: 'Applied for Senior Programmer',
                                        })"
                                        class="rounded-lg border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-100"
                                    >
                                        View
                                    </button>

                                    <button
                                        type="button"
                                        @click="openEdit({
                                            name: 'Initech',
                                            website: 'initech.com',
                                            email: 'hr@initech.com',
                                            address: '400 Corporate Drive',
                                            notes: 'Applied for Senior Programmer',
                                        })"
                                        class="rounded-lg border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-100"
                                    >
                                        Edit
                                    </button>

                                    <button
                                        type="button"
                                        class="rounded-lg border border-red-200 px-3 py-2 text-xs font-semibold text-red-600 hover:bg-red-50"
                                    >
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Table Footer --}}
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

        @include('companies.create')

        @include('companies.edit')

        @include('companies.show')
    </div>
</x-layouts.app-dashboard>