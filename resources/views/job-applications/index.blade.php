<x-layouts.app-dashboard title="Applications">
    <div
        x-data="{
            showCreateModal: false,
            showDetailModal: false,
            showEditModal: false,
            openMenu: null,

            selectedApplication: {
                id: '',
                company_id: '',
                company: '',
                position: '',
                status: '',
                source: '',
                salary: '',
                work_model: '',
                applied_date: '',
                interview_date: '',
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

        {{-- Filter Card --}}
        <section class="mb-6 rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
            <form
                method="GET"
                action="{{ route('job-applications.index') }}"
                class="grid gap-3 lg:grid-cols-12"
            >
                {{-- Search --}}
                <div class="relative lg:col-span-5">
                    <x-heroicon-o-magnifying-glass class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" />

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search position or company..."
                        class="w-full rounded-lg border border-slate-200 bg-white py-2.5 pl-10 pr-4 text-sm text-slate-700 placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                    >
                </div>

                {{-- Status Filter --}}
                <select
                    name="status"
                    onchange="this.form.submit()"
                    class="rounded-lg border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-700 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100 lg:col-span-2"
                >
                    <option value="">All Statuses</option>
                    <option value="applied" @selected(request('status') === 'applied')>Applied</option>
                    <option value="screening" @selected(request('status') === 'screening')>Screening</option>
                    <option value="interview" @selected(request('status') === 'interview')>Interview</option>
                    <option value="test" @selected(request('status') === 'test')>Test</option>
                    <option value="offered" @selected(request('status') === 'offered')>Offered</option>
                    <option value="accepted" @selected(request('status') === 'accepted')>Accepted</option>
                    <option value="rejected" @selected(request('status') === 'rejected')>Rejected</option>
                    <option value="ghosted" @selected(request('status') === 'ghosted')>Ghosted</option>
                </select>

                {{-- Work Model Filter --}}
                <select
                    name="work_model"
                    onchange="this.form.submit()"
                    class="rounded-lg border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-700 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100 lg:col-span-2"
                >
                    <option value="">All Work Models</option>
                    <option value="remote" @selected(request('work_model') === 'remote')>Remote</option>
                    <option value="hybrid" @selected(request('work_model') === 'hybrid')>Hybrid</option>
                    <option value="onsite" @selected(request('work_model') === 'onsite')>On-site</option>
                    <option value="full_time" @selected(request('work_model') === 'full_time')>Full Time</option>
                    <option value="part_time" @selected(request('work_model') === 'part_time')>Part Time</option>
                    <option value="internship" @selected(request('work_model') === 'internship')>Internship</option>
                    <option value="contract" @selected(request('work_model') === 'contract')>Contract</option>
                </select>

                {{-- Buttons --}}
                <div class="flex gap-2 lg:col-span-3">
                    <button
                        type="submit"
                        class="inline-flex flex-1 items-center justify-center gap-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-blue-700"
                    >
                        <x-heroicon-o-magnifying-glass class="h-4 w-4" />
                        Search
                    </button>

                    <a
                        href="{{ route('job-applications.index') }}"
                        class="inline-flex items-center justify-center rounded-lg border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-100"
                    >
                        Reset
                    </a>
                </div>
            </form>

            {{-- Active Filter Info --}}
            @if (request('search') || request('status') || request('work_model'))
                <div class="mt-4 flex flex-wrap items-center gap-2 border-t border-slate-100 pt-4">
                    <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Active filters:
                    </span>

                    @if (request('search'))
                        <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-700">
                            Search: {{ request('search') }}
                        </span>
                    @endif

                    @if (request('status'))
                        <span class="rounded-full bg-violet-50 px-3 py-1 text-xs font-semibold text-violet-700">
                            Status: {{ ucfirst(request('status')) }}
                        </span>
                    @endif

                    @if (request('work_model'))
                        <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold capitalize text-slate-700">
                            Work Model: {{ str_replace('_', ' ', request('work_model')) }}
                        </span>
                    @endif
                </div>
            @endif
        </section>

        {{-- Mobile / Tablet Cards --}}
        <div class="space-y-3 lg:hidden">
            @forelse ($applications as $application)
                @php
                    $companyName = $application->company->name ?? 'Unknown Company';
                    $companyInitial = strtoupper(substr($companyName, 0, 1));

                    $statusStyles = [
                        'applied' => 'bg-blue-100 text-blue-700',
                        'screening' => 'bg-violet-100 text-violet-700',
                        'interview' => 'bg-orange-100 text-orange-700',
                        'test' => 'bg-amber-100 text-amber-700',
                        'offered' => 'bg-emerald-100 text-emerald-700',
                        'accepted' => 'bg-emerald-600 text-white',
                        'rejected' => 'bg-red-100 text-red-700',
                        'ghosted' => 'bg-slate-200 text-slate-700',
                    ];

                    $statusClass = $statusStyles[$application->status] ?? 'bg-slate-100 text-slate-700';
                    $statusLabel = ucfirst($application->status);
                    $workModelLabel = ucwords(str_replace('_', ' ', $application->work_model));
                @endphp

                <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex min-w-0 items-center gap-3">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-blue-50 font-bold text-blue-700">
                                {{ $companyInitial }}
                            </div>

                            <div class="min-w-0">
                                <p class="truncate font-bold text-slate-950">
                                    {{ $companyName }}
                                </p>

                                <p class="truncate text-sm text-slate-500">
                                    {{ $application->position }}
                                </p>
                            </div>
                        </div>

                        <div class="relative shrink-0">
                            <button
                                type="button"
                                @click="openMenu === {{ $application->id }} ? openMenu = null : openMenu = {{ $application->id }}"
                                class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-slate-50 text-slate-600 hover:bg-slate-100"
                            >
                                <x-heroicon-o-ellipsis-horizontal class="h-5 w-5" />
                            </button>

                            <div
                                x-show="openMenu === {{ $application->id }}"
                                x-cloak
                                @click.away="openMenu = null"
                                class="absolute right-0 top-12 z-50 w-44 overflow-hidden rounded-xl border border-slate-200 bg-white text-left shadow-xl"
                            >
                                <button
                                    type="button"
                                    @click="openDetail({
                                        id: '{{ $application->id }}',
                                        company_id: '{{ $application->company_id }}',
                                        company: @js($companyName),
                                        position: @js($application->position),
                                        status: @js($application->status),
                                        source: @js($application->source ?? '-'),
                                        salary: @js($application->salary ?? ''),
                                        work_model: @js($application->work_model),
                                        applied_date: @js($application->applied_date),
                                        interview_date: @js($application->interview_date ?? ''),
                                        notes: @js($application->notes ?? '-')
                                    })"
                                    class="flex w-full items-center gap-2 px-4 py-3 text-sm text-slate-700 hover:bg-slate-100"
                                >
                                    <x-heroicon-o-eye class="h-4 w-4" />
                                    Show Detail
                                </button>

                                <button
                                    type="button"
                                    @click="openEdit({
                                        id: '{{ $application->id }}',
                                        company_id: '{{ $application->company_id }}',
                                        company: @js($companyName),
                                        position: @js($application->position),
                                        status: @js($application->status),
                                        source: @js($application->source ?? ''),
                                        salary: @js($application->salary ?? ''),
                                        work_model: @js($application->work_model),
                                        applied_date: @js($application->applied_date),
                                        interview_date: @js($application->interview_date ?? ''),
                                        notes: @js($application->notes ?? '')
                                    })"
                                    class="flex w-full items-center gap-2 px-4 py-3 text-sm text-slate-700 hover:bg-slate-100"
                                >
                                    <x-heroicon-o-pencil-square class="h-4 w-4" />
                                    Edit
                                </button>

                                <form
                                    method="POST"
                                    action="{{ route('job-applications.destroy', $application) }}"
                                    onsubmit="return confirm('Are you sure you want to delete this application?')"
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

                    <div class="mt-4 grid grid-cols-2 gap-3 text-sm">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Status</p>
                            <span class="mt-1 inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $statusClass }}">
                                {{ $statusLabel }}
                            </span>
                        </div>

                        <div>
                            <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Work Model</p>
                            <p class="mt-1 text-slate-700">{{ $workModelLabel }}</p>
                        </div>

                        <div>
                            <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Source</p>
                            <p class="mt-1 text-slate-700">{{ $application->source ?? '-' }}</p>
                        </div>

                        <div>
                            <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Date</p>
                            <p class="mt-1 text-slate-700">
                                {{ \Carbon\Carbon::parse($application->applied_date)->format('M d, Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="rounded-2xl border border-dashed border-slate-300 bg-white p-6 text-center text-sm text-slate-500">
                    No applications found yet.
                </div>
            @endforelse
        </div>

        {{-- Applications Table --}}
        <section class="hidden rounded-xl border border-slate-200 bg-white shadow-sm lg:block">
            <div class="overflow-x-auto lg:overflow-visible">
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
                        @forelse ($applications as $application)
                            @php
                                $companyName = $application->company->name ?? 'Unknown Company';
                                $companyInitial = strtoupper(substr($companyName, 0, 1));

                                $statusStyles = [
                                    'applied' => 'bg-blue-100 text-blue-700',
                                    'screening' => 'bg-violet-100 text-violet-700',
                                    'interview' => 'bg-orange-100 text-orange-700',
                                    'test' => 'bg-amber-100 text-amber-700',
                                    'offered' => 'bg-emerald-100 text-emerald-700',
                                    'accepted' => 'bg-emerald-600 text-white',
                                    'rejected' => 'bg-red-100 text-red-700',
                                    'ghosted' => 'bg-slate-200 text-slate-700',
                                ];

                                $statusClass = $statusStyles[$application->status] ?? 'bg-slate-100 text-slate-700';
                                $statusLabel = ucfirst($application->status);
                                $workModelLabel = ucwords(str_replace('_', ' ', $application->work_model));
                            @endphp

                            <tr class="hover:bg-slate-50">
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-9 w-9 items-center justify-center rounded bg-blue-50 font-bold text-blue-700">
                                            {{ $companyInitial }}
                                        </div>

                                        <p class="font-bold text-slate-950">
                                            {{ $companyName }}
                                        </p>
                                    </div>
                                </td>

                                <td class="px-6 py-5 text-slate-700">
                                    {{ $application->position }}
                                </td>

                                <td class="px-6 py-5">
                                    <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $statusClass }}">
                                        {{ $statusLabel }}
                                    </span>
                                </td>

                                <td class="px-6 py-5 text-slate-600">
                                    {{ $application->source ?? '-' }}
                                </td>

                                <td class="px-6 py-5 text-slate-600">
                                    {{ $application->salary ? 'Rp ' . number_format($application->salary, 0, ',', '.') : '-' }}
                                </td>

                                <td class="px-6 py-5">
                                    <span class="inline-flex items-center gap-1 text-xs font-medium text-slate-700">
                                        @if ($application->work_model === 'remote')
                                            <x-heroicon-o-wifi class="h-4 w-4" />
                                        @else
                                            <x-heroicon-o-building-office-2 class="h-4 w-4" />
                                        @endif

                                        {{ $workModelLabel }}
                                    </span>
                                </td>

                                <td class="px-6 py-5 text-slate-600">
                                    {{ \Carbon\Carbon::parse($application->applied_date)->format('M d, Y') }}
                                </td>

                                <td class="relative overflow-visible px-6 py-5 text-right">
                                    <button
                                        type="button"
                                        @click="openMenu === {{ $application->id }} ? openMenu = null : openMenu = {{ $application->id }}"
                                        class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-slate-900"
                                    >
                                        <x-heroicon-o-ellipsis-horizontal class="h-5 w-5" />
                                    </button>

                                    <div
                                        x-show="openMenu === {{ $application->id }}"
                                        x-cloak
                                        @click.away="openMenu = null"
                                        class="fixed right-10 z-[9999] w-44 overflow-hidden rounded-xl border border-slate-200 bg-white text-left shadow-xl"
                                        style="top: 260px;"
                                    >
                                        <button
                                            type="button"
                                            @click="openDetail({
                                                id: '{{ $application->id }}',
                                                company_id: '{{ $application->company_id }}',
                                                company: @js($companyName),
                                                position: @js($application->position),
                                                status: @js($application->status),
                                                source: @js($application->source ?? '-'),
                                                salary: @js($application->salary ?? ''),
                                                work_model: @js($application->work_model),
                                                applied_date: @js($application->applied_date),
                                                interview_date: @js($application->interview_date ?? ''),
                                                notes: @js($application->notes ?? '-')
                                            })"
                                            class="flex w-full items-center gap-2 px-4 py-2.5 text-sm text-slate-700 hover:bg-slate-100"
                                        >
                                            <x-heroicon-o-eye class="h-4 w-4" />
                                            Show Detail
                                        </button>

                                        <button
                                            type="button"
                                            @click="openEdit({
                                                id: '{{ $application->id }}',
                                                company_id: '{{ $application->company_id }}',
                                                company: @js($companyName),
                                                position: @js($application->position),
                                                status: @js($application->status),
                                                source: @js($application->source ?? ''),
                                                salary: @js($application->salary ?? ''),
                                                work_model: @js($application->work_model),
                                                applied_date: @js($application->applied_date),
                                                interview_date: @js($application->interview_date ?? ''),
                                                notes: @js($application->notes ?? '')
                                            })"
                                            class="flex w-full items-center gap-2 px-4 py-2.5 text-sm text-slate-700 hover:bg-slate-100"
                                        >
                                            <x-heroicon-o-pencil-square class="h-4 w-4" />
                                            Edit
                                        </button>

                                        <form
                                            method="POST"
                                            action="{{ route('job-applications.destroy', $application) }}"
                                            onsubmit="return confirm('Are you sure you want to delete this application?')"
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
                                <td colspan="8" class="px-6 py-10 text-center text-sm text-slate-500">
                                    No applications found yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Footer --}}
            @if ($applications->hasPages())
                <div class="flex flex-col gap-4 border-t border-slate-200 px-6 py-4 sm:flex-row sm:items-center sm:justify-between">
                    <p class="text-sm text-slate-600">
                        Showing {{ $applications->firstItem() }} to {{ $applications->lastItem() }} of {{ $applications->total() }} applications
                    </p>

                    <div class="flex items-center gap-2">
                        @if ($applications->onFirstPage())
                            <span class="cursor-not-allowed rounded-lg border border-slate-200 px-4 py-2 text-sm text-slate-400">
                                Previous
                            </span>
                        @else
                            <a
                                href="{{ $applications->previousPageUrl() }}"
                                class="rounded-lg border border-slate-200 px-4 py-2 text-sm text-slate-600 hover:bg-slate-100"
                            >
                                Previous
                            </a>
                        @endif

                        @if ($applications->hasMorePages())
                            <a
                                href="{{ $applications->nextPageUrl() }}"
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
                        Showing {{ $applications->count() }} applications
                    </p>
                </div>
            @endif
        </section>

        @include('job-applications.create')
        @include('job-applications.show')
        @include('job-applications.edit')
    </div>
</x-layouts.app-dashboard>