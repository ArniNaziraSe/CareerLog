<div>
    <div class="mb-4 flex items-center justify-between">
        <h3 class="text-xl font-bold text-slate-950">
            Upcoming Interviews
        </h3>

        <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">
            {{ $upcomingInterviews->count() }} Upcoming
        </span>
    </div>

    <div class="space-y-4">
        @forelse ($upcomingInterviews as $interview)
            @php
                $companyName = $interview->company->name ?? 'Unknown Company';

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

                $statusClass = $statusStyles[$interview->status] ?? 'bg-slate-100 text-slate-700';

                $statusLabel = ucfirst($interview->status);

                $interviewDate = $interview->interview_date
                    ? \Carbon\Carbon::parse($interview->interview_date)->format('M d, Y')
                    : '-';
            @endphp

            <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <h4 class="text-lg font-bold text-slate-950">
                            {{ $interview->position }}
                        </h4>

                        <p class="mt-2 flex items-center gap-2 text-sm text-slate-600">
                            <x-heroicon-o-building-office-2 class="h-4 w-4 text-slate-400" />
                            {{ $companyName }}
                        </p>

                        <p class="mt-2 flex items-center gap-2 text-sm text-slate-600">
                            <x-heroicon-o-calendar-days class="h-4 w-4 text-slate-400" />
                            {{ $interviewDate }}
                        </p>
                    </div>

                    <span class="shrink-0 rounded-full px-3 py-1 text-xs font-semibold {{ $statusClass }}">
                        {{ $statusLabel }}
                    </span>
                </div>

                <div class="mt-5 grid grid-cols-2 gap-3 text-sm">
                    <div class="rounded-lg bg-slate-50 px-3 py-2">
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                            Work Model
                        </p>

                        <p class="mt-1 font-medium capitalize text-slate-700">
                            {{ str_replace('_', ' ', $interview->work_model) }}
                        </p>
                    </div>

                    <div class="rounded-lg bg-slate-50 px-3 py-2">
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                            Source
                        </p>

                        <p class="mt-1 font-medium text-slate-700">
                            {{ $interview->source ?? '-' }}
                        </p>
                    </div>
                </div>

                <a
                    href="{{ route('job-applications.index') }}"
                    class="mt-5 block rounded-lg border border-slate-300 px-4 py-3 text-center text-sm font-semibold text-slate-800 hover:bg-slate-100"
                >
                    View Application
                </a>
            </div>
        @empty
            <div class="rounded-xl border border-dashed border-slate-300 bg-white p-6 text-center shadow-sm">
                <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-blue-50 text-blue-700">
                    <x-heroicon-o-calendar-days class="h-6 w-6" />
                </div>

                <h4 class="mt-4 font-bold text-slate-950">
                    No upcoming interviews
                </h4>

                <p class="mt-2 text-sm text-slate-500">
                    Applications with interview dates will appear here.
                </p>

                <a
                    href="{{ route('job-applications.index') }}"
                    class="mt-5 inline-flex items-center justify-center rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-blue-700"
                >
                    Add Application
                </a>
            </div>
        @endforelse
    </div>
</div>