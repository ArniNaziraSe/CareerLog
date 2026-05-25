<x-layouts.app-dashboard title="Companies">
    <div
        x-data="{
            showCreateModal: false,
            showEditModal: false,
            showDetailModal: false,
            openMenu: null,

            selectedCompany: {
                id: '',
                name: '',
                website: '',
                email: '',
                address: '',
                notes: '',
            },

            openDetail(company) {
                this.selectedCompany = company;
                this.showDetailModal = true;
                this.openMenu = null;
            },

            openEdit(company) {
                this.selectedCompany = company;
                this.showEditModal = true;
                this.openMenu = null;
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
                <form method="GET" action="{{ route('companies.index') }}" class="relative w-full sm:w-72">
                    <x-heroicon-o-magnifying-glass class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" />

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search company..."
                        class="w-full rounded-lg border border-slate-200 bg-white py-2.5 pl-10 pr-10 text-sm text-slate-700 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                    >

                    @if (request('search'))
                        <a
                            href="{{ route('companies.index') }}"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-700"
                        >
                            <x-heroicon-o-x-mark class="h-4 w-4" />
                        </a>
                    @endif
                </form>

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

        @if (session('success'))
            <div class="mb-4 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                <p class="font-semibold">Something went wrong:</p>

                <ul class="mt-2 list-inside list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Mobile Cards --}}
        <div class="space-y-3 lg:hidden">
            @forelse ($companies as $company)
                <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex min-w-0 items-center gap-3">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-blue-50 font-bold text-blue-700">
                                {{ strtoupper(substr($company->name, 0, 1)) }}
                            </div>

                            <div class="min-w-0">
                                <p class="truncate font-bold text-slate-950">
                                    {{ $company->name }}
                                </p>

                                <p class="truncate text-sm text-slate-500">
                                    {{ $company->email ?? 'No email' }}
                                </p>
                            </div>
                        </div>

                        <div class="relative shrink-0">
                            <button
                                type="button"
                                @click="openMenu === {{ $company->id }} ? openMenu = null : openMenu = {{ $company->id }}"
                                class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-slate-50 text-slate-600 hover:bg-slate-100"
                            >
                                <x-heroicon-o-ellipsis-horizontal class="h-5 w-5" />
                            </button>

                            <div
                                x-show="openMenu === {{ $company->id }}"
                                x-cloak
                                @click.away="openMenu = null"
                                class="absolute right-0 top-12 z-50 w-44 overflow-hidden rounded-xl border border-slate-200 bg-white text-left shadow-xl"
                            >
                                <button
                                    type="button"
                                    @click="openDetail({
                                        id: '{{ $company->id }}',
                                        name: @js($company->name),
                                        website: @js($company->website ?? '-'),
                                        email: @js($company->email ?? '-'),
                                        address: @js($company->address ?? '-'),
                                        notes: @js($company->notes ?? '-')
                                    })"
                                    class="flex w-full items-center gap-2 px-4 py-3 text-sm text-slate-700 hover:bg-slate-100"
                                >
                                    <x-heroicon-o-eye class="h-4 w-4" />
                                    Show Detail
                                </button>

                                <button
                                    type="button"
                                    @click="openEdit({
                                        id: '{{ $company->id }}',
                                        name: @js($company->name),
                                        website: @js($company->website ?? ''),
                                        email: @js($company->email ?? ''),
                                        address: @js($company->address ?? ''),
                                        notes: @js($company->notes ?? '')
                                    })"
                                    class="flex w-full items-center gap-2 px-4 py-3 text-sm text-slate-700 hover:bg-slate-100"
                                >
                                    <x-heroicon-o-pencil-square class="h-4 w-4" />
                                    Edit
                                </button>

                                <form
                                    method="POST"
                                    action="{{ route('companies.destroy', $company) }}"
                                    onsubmit="return confirm('Are you sure you want to delete this company?')"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="flex w-full items-center gap-2 px-4 py-3 text-sm text-red-600 hover:bg-red-50"
                                    >
                                        <x-heroicon-o-trash class="h-4 w-4" />
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 grid gap-3 text-sm">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Website</p>
                            <p class="mt-1 text-slate-700">{{ $company->website ?? '-' }}</p>
                        </div>

                        <div>
                            <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Address</p>
                            <p class="mt-1 text-slate-700">{{ $company->address ?? '-' }}</p>
                        </div>

                        <div>
                            <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Notes</p>
                            <p class="mt-1 text-slate-700">{{ $company->notes ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="rounded-2xl border border-dashed border-slate-300 bg-white p-6 text-center text-sm text-slate-500">
                    No companies found yet.
                </div>
            @endforelse
        </div>

        {{-- Companies Table Card --}}
        <div class="hidden rounded-xl border border-slate-200 bg-white shadow-sm lg:block">
            <div class="overflow-x-auto lg:overflow-visible">
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
                        @forelse ($companies as $company)
                            <tr class="hover:bg-slate-50">
                                {{-- Company Name --}}
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-blue-50 font-bold text-blue-700">
                                            {{ strtoupper(substr($company->name, 0, 1)) }}
                                        </div>

                                        <div>
                                            <p class="font-semibold text-slate-900">
                                                {{ $company->name }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                {{-- Website --}}
                                <td class="px-6 py-5 text-slate-700">
                                    {{ $company->website ?? '-' }}
                                </td>

                                {{-- Email --}}
                                <td class="px-6 py-5 text-slate-700">
                                    {{ $company->email ?? '-' }}
                                </td>

                                {{-- Address --}}
                                <td class="px-6 py-5 text-slate-700">
                                    {{ $company->address ?? '-' }}
                                </td>

                                {{-- Notes --}}
                                <td class="max-w-xs px-6 py-5 text-slate-700">
                                    <p class="line-clamp-2">
                                        {{ $company->notes ?? '-' }}
                                    </p>
                                </td>

                                {{-- Action --}}
                                <td class="relative overflow-visible px-6 py-5 text-right">
                                    <button
                                        type="button"
                                        @click="openMenu === {{ $company->id }} ? openMenu = null : openMenu = {{ $company->id }}"
                                        class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-slate-900"
                                    >
                                        <x-heroicon-o-ellipsis-horizontal class="h-5 w-5" />
                                    </button>

                                    <div
                                        x-show="openMenu === {{ $company->id }}"
                                        x-cloak
                                        @click.away="openMenu = null"
                                        class="absolute right-0 top-12 z-50 w-44 overflow-hidden rounded-xl border border-slate-200 bg-white text-left shadow-xl"
                                    >
                                        <button
                                            type="button"
                                            @click="openDetail({
                                                id: '{{ $company->id }}',
                                                name: @js($company->name),
                                                website: @js($company->website ?? '-'),
                                                email: @js($company->email ?? '-'),
                                                address: @js($company->address ?? '-'),
                                                notes: @js($company->notes ?? '-')
                                            })"
                                            class="flex w-full items-center gap-2 px-4 py-2.5 text-sm text-slate-700 hover:bg-slate-100"
                                        >
                                            <x-heroicon-o-eye class="h-4 w-4" />
                                            Show Detail
                                        </button>

                                        <button
                                            type="button"
                                            @click="openEdit({
                                                id: '{{ $company->id }}',
                                                name: @js($company->name),
                                                website: @js($company->website ?? ''),
                                                email: @js($company->email ?? ''),
                                                address: @js($company->address ?? ''),
                                                notes: @js($company->notes ?? '')
                                            })"
                                            class="flex w-full items-center gap-2 px-4 py-2.5 text-sm text-slate-700 hover:bg-slate-100"
                                        >
                                            <x-heroicon-o-pencil-square class="h-4 w-4" />
                                            Edit
                                        </button>

                                        <form
                                            method="POST"
                                            action="{{ route('companies.destroy', $company) }}"
                                            onsubmit="return confirm('Are you sure you want to delete this company?')"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="flex w-full items-center gap-2 px-4 py-2.5 text-sm text-red-600 hover:bg-red-50"
                                            >
                                                <x-heroicon-o-trash class="h-4 w-4" />
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-10 text-center text-sm text-slate-500">
                                    No companies found yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Table Footer --}}
            @if ($companies->hasPages())
                <div class="flex flex-col gap-4 border-t border-slate-200 px-6 py-4 sm:flex-row sm:items-center sm:justify-between">
                    <p class="text-sm text-slate-600">
                        Showing {{ $companies->firstItem() }} to {{ $companies->lastItem() }} of {{ $companies->total() }} companies
                    </p>

                    <div class="flex items-center gap-2">
                        @if ($companies->onFirstPage())
                            <span class="cursor-not-allowed rounded-lg border border-slate-200 px-4 py-2 text-sm text-slate-400">
                                Previous
                            </span>
                        @else
                            <a
                                href="{{ $companies->previousPageUrl() }}"
                                class="rounded-lg border border-slate-200 px-4 py-2 text-sm text-slate-600 hover:bg-slate-100"
                            >
                                Previous
                            </a>
                        @endif

                        @if ($companies->hasMorePages())
                            <a
                                href="{{ $companies->nextPageUrl() }}"
                                class="rounded-lg border border-slate-200 px-4 py-2 text-sm font-medium text-slate-800 hover:bg-slate-100"
                            >
                                Next
                            </a>
                        @else
                            <span class="cursor-not-allowed rounded-lg border border-slate-200 px-4 py-2 text-sm text-slate-400">
                                Next
                            </span>
                        @endif
                    </div>
                </div>
            @else
                <div class="border-t border-slate-200 px-6 py-4">
                    <p class="text-sm text-slate-600">
                        Showing {{ $companies->count() }} companies
                    </p>
                </div>
            @endif
            </div>

        @include('companies.create')

        @include('companies.edit')

        @include('companies.show')
    </div>
</x-layouts.app-dashboard>