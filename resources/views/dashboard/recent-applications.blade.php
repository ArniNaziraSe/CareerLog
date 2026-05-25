<div class="xl:col-span-2">
    <div class="mb-4 flex items-center justify-between">
        <h3 class="text-xl font-bold text-slate-950">
            Recent Applications
        </h3>

        <a href="{{ route('job-applications.index') }}" class="text-sm font-medium text-blue-700 hover:text-blue-800">
            View all
        </a>
    </div>

    {{-- Mobile and Tablet Cards --}}
    <div class="space-y-3 lg:hidden">
        @forelse ($recentApplications as $application)
            @php
                $statusStyles = [
                    'applied' => 'bg-slate-100 text-slate-700',
                    'screening' => 'bg-violet-100 text-violet-700',
                    'interview' => 'bg-blue-600 text-white',
                    'test' => 'bg-amber-100 text-amber-700',
                    'offered' => 'bg-emerald-100 text-emerald-700',
                    'accepted' => 'bg-emerald-600 text-white',
                    'rejected' => 'bg-red-100 text-red-700',
                    'ghosted' => 'bg-slate-200 text-slate-700',
                ];

                $statusClass = $statusStyles[$application->status] ?? 'bg-slate-100 text-slate-700';

                $companyName = $application->company->name ?? 'Unknown Company';

                $companyInitial = strtoupper(substr($companyName, 0, 1));

                $statusLabel = ucfirst($application->status);

                $workModelLabel = str_replace('_', ' ', $application->work_model);
            @endphp

            <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
                <div class="flex items-start justify-between gap-3">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-blue-50 font-bold text-blue-700">
                            {{ $companyInitial }}
                        </div>

                        <div>
                            <p class="font-bold text-slate-950">
                                {{ $companyName }}
                            </p>

                            <p class="text-xs text-slate-500">
                                {{ $application->source ?? 'No source' }}
                            </p>
                        </div>
                    </div>

                    <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $statusClass }}">
                        {{ $statusLabel }}
                    </span>
                </div>

                <div class="mt-4 grid grid-cols-2 gap-3 text-sm">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                            Position
                        </p>

                        <p class="mt-1 font-medium text-slate-800">
                            {{ $application->position }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                            Model
                        </p>

                        <p class="mt-1 font-medium capitalize text-slate-800">
                            {{ $workModelLabel }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                            Date
                        </p>

                        <p class="mt-1 font-medium text-slate-800">
                            {{ \Carbon\Carbon::parse($application->applied_date)->format('M d, Y') }}
                        </p>
                    </div>

                    <div class="flex items-end justify-end">
                        <a href="{{ route('job-applications.index') }}" class="font-semibold text-blue-700 hover:text-blue-800">
                            View
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="rounded-xl border border-dashed border-slate-300 bg-white p-6 text-center">
                <p class="font-semibold text-slate-800">
                    No applications yet
                </p>

                <p class="mt-1 text-sm text-slate-500">
                    Add your first job application to see it here.
                </p>

                <a href="{{ route('job-applications.index') }}" class="mt-4 inline-flex items-center justify-center rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-blue-700">
                    Add Application
                </a>
            </div>
        @endforelse
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
                    @forelse ($recentApplications as $application)
                        @php
                            $statusStyles = [
                                'applied' => 'bg-slate-100 text-slate-700',
                                'screening' => 'bg-violet-100 text-violet-700',
                                'interview' => 'bg-blue-600 text-white',
                                'test' => 'bg-amber-100 text-amber-700',
                                'offered' => 'bg-emerald-100 text-emerald-700',
                                'accepted' => 'bg-emerald-600 text-white',
                                'rejected' => 'bg-red-100 text-red-700',
                                'ghosted' => 'bg-slate-200 text-slate-700',
                            ];

                            $statusClass = $statusStyles[$application->status] ?? 'bg-slate-100 text-slate-700';

                            $companyName = $application->company->name ?? 'Unknown Company';

                            $companyInitial = strtoupper(substr($companyName, 0, 1));

                            $statusLabel = ucfirst($application->status);

                            $workModelLabel = str_replace('_', ' ', $application->work_model);
                        @endphp

                        <tr class="hover:bg-slate-50">
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-9 w-9 items-center justify-center rounded bg-blue-50 font-bold text-blue-700">
                                        {{ $companyInitial }}
                                    </div>

                                    <div>
                                        <p class="font-semibold text-slate-900">
                                            {{ $companyName }}
                                        </p>

                                        <p class="text-xs text-slate-500">
                                            {{ $application->source ?? 'No source' }}
                                        </p>
                                    </div>
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

                            <td class="px-6 py-5">
                                <span class="rounded-md border border-slate-200 px-3 py-1 text-xs capitalize text-slate-700">
                                    {{ $workModelLabel }}
                                </span>
                            </td>

                            <td class="px-6 py-5 text-slate-600">
                                {{ \Carbon\Carbon::parse($application->applied_date)->format('M d, Y') }}
                            </td>

                            <td class="px-6 py-5 text-right">
                                <a href="{{ route('job-applications.index') }}" class="font-medium text-blue-700 hover:text-blue-800">
                                    View
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center text-sm text-slate-500">
                                No applications found yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>