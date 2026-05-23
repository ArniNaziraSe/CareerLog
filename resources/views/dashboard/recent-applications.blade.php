<div class="xl:col-span-2">
    <div class="mb-4 flex items-center justify-between">
        <h3 class="text-xl font-bold text-slate-950">
            Recent Applications
        </h3>

        <a href="{{ route('job-applications.index') }}" class="text-sm font-medium text-blue-700 hover:text-blue-800">
            View all
        </a>
    </div>

    {{-- Mobile Cards --}}
    <div class="space-y-3 lg:hidden">
        {{-- Card 1 --}}
        <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
            <div class="flex items-start justify-between gap-3">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-blue-50 font-bold text-blue-700">
                        A
                    </div>

                    <div>
                        <p class="font-bold text-slate-950">
                            Acme Corp
                        </p>

                        <p class="text-xs text-slate-500">
                            Technology
                        </p>
                    </div>
                </div>

                <span class="rounded-full bg-violet-100 px-3 py-1 text-xs font-semibold text-violet-700">
                    Screening
                </span>
            </div>

            <div class="mt-4 grid grid-cols-2 gap-3 text-sm">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Position
                    </p>

                    <p class="mt-1 font-medium text-slate-800">
                        Senior Product Designer
                    </p>
                </div>

                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Model
                    </p>

                    <p class="mt-1 font-medium text-slate-800">
                        Remote
                    </p>
                </div>

                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Date
                    </p>

                    <p class="mt-1 font-medium text-slate-800">
                        Oct 24, 2023
                    </p>
                </div>

                <div class="flex items-end justify-end">
                    <a href="{{ route('job-applications.index') }}" class="font-semibold text-blue-700 hover:text-blue-800">
                        View
                    </a>
                </div>
            </div>
        </div>

        {{-- Card 2 --}}
        <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
            <div class="flex items-start justify-between gap-3">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-blue-50 font-bold text-blue-700">
                        G
                    </div>

                    <div>
                        <p class="font-bold text-slate-950">
                            Global Tech
                        </p>

                        <p class="text-xs text-slate-500">
                            Software
                        </p>
                    </div>
                </div>

                <span class="rounded-full bg-blue-600 px-3 py-1 text-xs font-semibold text-white">
                    Interview
                </span>
            </div>

            <div class="mt-4 grid grid-cols-2 gap-3 text-sm">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Position
                    </p>

                    <p class="mt-1 font-medium text-slate-800">
                        UX Researcher
                    </p>
                </div>

                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Model
                    </p>

                    <p class="mt-1 font-medium text-slate-800">
                        Hybrid
                    </p>
                </div>

                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Date
                    </p>

                    <p class="mt-1 font-medium text-slate-800">
                        Oct 20, 2023
                    </p>
                </div>

                <div class="flex items-end justify-end">
                    <a href="{{ route('job-applications.index') }}" class="font-semibold text-blue-700 hover:text-blue-800">
                        View
                    </a>
                </div>
            </div>
        </div>

        {{-- Card 3 --}}
        <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
            <div class="flex items-start justify-between gap-3">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-blue-50 font-bold text-blue-700">
                        Z
                    </div>

                    <div>
                        <p class="font-bold text-slate-950">
                            Zenith Inc
                        </p>

                        <p class="text-xs text-slate-500">
                            Design Studio
                        </p>
                    </div>
                </div>

                <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700">
                    Applied
                </span>
            </div>

            <div class="mt-4 grid grid-cols-2 gap-3 text-sm">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Position
                    </p>

                    <p class="mt-1 font-medium text-slate-800">
                        UI Designer
                    </p>
                </div>

                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Model
                    </p>

                    <p class="mt-1 font-medium text-slate-800">
                        On-site
                    </p>
                </div>

                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Date
                    </p>

                    <p class="mt-1 font-medium text-slate-800">
                        Oct 18, 2023
                    </p>
                </div>

                <div class="flex items-end justify-end">
                    <a href="{{ route('job-applications.index') }}" class="font-semibold text-blue-700 hover:text-blue-800">
                        View
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Desktop Table --}}
    <div class="hidden overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm lg:block">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-100 text-xs uppercase tracking-wider text-slate-500">
                    <tr>
                        <th class="px-6 py-4">Company</th>
                        <th class="px-6 py-4">Position</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Model</th>
                        <th class="px-6 py-4">Date</th>
                        <th class="px-6 py-4 text-right">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-200">
                    <tr class="hover:bg-slate-50">
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-3">
                                <div class="flex h-9 w-9 items-center justify-center rounded bg-blue-50 font-bold text-blue-700">
                                    A
                                </div>

                                <div>
                                    <p class="font-semibold text-slate-900">Acme Corp</p>
                                    <p class="text-xs text-slate-500">Technology</p>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-5 text-slate-700">
                            Senior Product Designer
                        </td>

                        <td class="px-6 py-5">
                            <span class="rounded-full bg-violet-100 px-3 py-1 text-xs font-semibold text-violet-700">
                                Screening
                            </span>
                        </td>

                        <td class="px-6 py-5">
                            <span class="rounded-md border border-slate-200 px-3 py-1 text-xs text-slate-700">
                                Remote
                            </span>
                        </td>

                        <td class="px-6 py-5 text-slate-600">
                            Oct 24, 2023
                        </td>

                        <td class="px-6 py-5 text-right">
                            <a href="{{ route('job-applications.index') }}" class="font-medium text-blue-700 hover:text-blue-800">
                                View
                            </a>
                        </td>
                    </tr>

                    <tr class="hover:bg-slate-50">
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-3">
                                <div class="flex h-9 w-9 items-center justify-center rounded bg-blue-50 font-bold text-blue-700">
                                    G
                                </div>

                                <div>
                                    <p class="font-semibold text-slate-900">Global Tech</p>
                                    <p class="text-xs text-slate-500">Software</p>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-5 text-slate-700">
                            UX Researcher
                        </td>

                        <td class="px-6 py-5">
                            <span class="rounded-full bg-blue-600 px-3 py-1 text-xs font-semibold text-white">
                                Interview
                            </span>
                        </td>

                        <td class="px-6 py-5">
                            <span class="rounded-md border border-slate-200 px-3 py-1 text-xs text-slate-700">
                                Hybrid
                            </span>
                        </td>

                        <td class="px-6 py-5 text-slate-600">
                            Oct 20, 2023
                        </td>

                        <td class="px-6 py-5 text-right">
                            <a href="{{ route('job-applications.index') }}" class="font-medium text-blue-700 hover:text-blue-800">
                                View
                            </a>
                        </td>
                    </tr>

                    <tr class="hover:bg-slate-50">
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-3">
                                <div class="flex h-9 w-9 items-center justify-center rounded bg-blue-50 font-bold text-blue-700">
                                    Z
                                </div>

                                <div>
                                    <p class="font-semibold text-slate-900">Zenith Inc</p>
                                    <p class="text-xs text-slate-500">Design Studio</p>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-5 text-slate-700">
                            UI Designer
                        </td>

                        <td class="px-6 py-5">
                            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700">
                                Applied
                            </span>
                        </td>

                        <td class="px-6 py-5">
                            <span class="rounded-md border border-slate-200 px-3 py-1 text-xs text-slate-700">
                                On-site
                            </span>
                        </td>

                        <td class="px-6 py-5 text-slate-600">
                            Oct 18, 2023
                        </td>

                        <td class="px-6 py-5 text-right">
                            <a href="{{ route('job-applications.index') }}" class="font-medium text-blue-700 hover:text-blue-800">
                                View
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>