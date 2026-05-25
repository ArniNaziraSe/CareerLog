@php
    $pipelineStatuses = [
        [
            'label' => 'Applied',
            'count' => $appliedCount,
            'description' => 'Resume submitted',
            'icon' => 'paper-airplane',
            'iconBg' => 'bg-blue-100',
            'iconText' => 'text-blue-700',
            'barColor' => 'bg-blue-500',
            'cardClass' => 'border-slate-200 bg-slate-50 hover:bg-white hover:shadow-sm',
            'textClass' => 'text-slate-800',
            'descClass' => 'text-slate-500',
            'percentClass' => 'text-slate-500',
        ],
        [
            'label' => 'Screening',
            'count' => $screeningCount,
            'description' => 'Recruiter review',
            'icon' => 'chat-bubble-left-right',
            'iconBg' => 'bg-violet-100',
            'iconText' => 'text-violet-700',
            'barColor' => 'bg-violet-500',
            'cardClass' => 'border-slate-200 bg-slate-50 hover:bg-white hover:shadow-sm',
            'textClass' => 'text-slate-800',
            'descClass' => 'text-slate-500',
            'percentClass' => 'text-slate-500',
        ],
        [
            'label' => 'Interview',
            'count' => $interviewCount,
            'description' => 'Active conversations',
            'icon' => 'microphone',
            'iconBg' => 'bg-blue-600',
            'iconText' => 'text-white',
            'barColor' => 'bg-blue-600',
            'cardClass' => 'border-blue-200 bg-blue-50 shadow-sm hover:shadow-md',
            'textClass' => 'text-blue-800',
            'descClass' => 'text-blue-600',
            'percentClass' => 'text-blue-600 font-semibold',
        ],
        [
            'label' => 'Test',
            'count' => $testCount,
            'description' => 'Assessment stage',
            'icon' => 'clipboard-document-check',
            'iconBg' => 'bg-amber-100',
            'iconText' => 'text-amber-700',
            'barColor' => 'bg-amber-500',
            'cardClass' => 'border-slate-200 bg-slate-50 hover:bg-white hover:shadow-sm',
            'textClass' => 'text-slate-800',
            'descClass' => 'text-slate-500',
            'percentClass' => 'text-slate-500',
        ],
        [
            'label' => 'Offered',
            'count' => $offeredCount,
            'description' => 'Offer received',
            'icon' => 'trophy',
            'iconBg' => 'bg-emerald-100',
            'iconText' => 'text-emerald-700',
            'barColor' => 'bg-emerald-500',
            'cardClass' => 'border-slate-200 bg-slate-50 hover:bg-white hover:shadow-sm',
            'textClass' => 'text-slate-800',
            'descClass' => 'text-slate-500',
            'percentClass' => 'text-slate-500',
        ],
    ];
@endphp

<section class="mt-8 rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
    <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h3 class="text-xl font-bold text-slate-950">
                Pipeline Overview
            </h3>

            <p class="mt-1 text-sm text-slate-500">
                Track your application progress by current status.
            </p>
        </div>

        <span class="inline-flex w-fit items-center rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">
            {{ $totalApplications }} Total Applications
        </span>
    </div>

    <div class="mt-6 grid gap-4 sm:grid-cols-2 xl:grid-cols-5">
        @foreach ($pipelineStatuses as $status)
            @php
                $percentage = $totalApplications > 0
                    ? round(($status['count'] / $totalApplications) * 100)
                    : 0;
            @endphp

            <div class="rounded-xl border p-4 transition hover:-translate-y-1 {{ $status['cardClass'] }}">
                <div class="flex items-center justify-between">
                    <div class="flex h-11 w-11 items-center justify-center rounded-lg {{ $status['iconBg'] }} {{ $status['iconText'] }}">
                        @switch($status['icon'])
                            @case('paper-airplane')
                                <x-heroicon-o-paper-airplane class="h-5 w-5" />
                                @break

                            @case('chat-bubble-left-right')
                                <x-heroicon-o-chat-bubble-left-right class="h-5 w-5" />
                                @break

                            @case('microphone')
                                <x-heroicon-o-microphone class="h-5 w-5" />
                                @break

                            @case('clipboard-document-check')
                                <x-heroicon-o-clipboard-document-check class="h-5 w-5" />
                                @break

                            @case('trophy')
                                <x-heroicon-o-trophy class="h-5 w-5" />
                                @break
                        @endswitch
                    </div>

                    <span class="text-2xl font-bold {{ $status['textClass'] }}">
                        {{ $status['count'] }}
                    </span>
                </div>

                <div class="mt-4">
                    <p class="font-semibold {{ $status['textClass'] }}">
                        {{ $status['label'] }}
                    </p>

                    <p class="mt-1 text-xs {{ $status['descClass'] }}">
                        {{ $status['description'] }}
                    </p>
                </div>

                <div class="mt-4 h-2 overflow-hidden rounded-full bg-slate-200">
                    <div
                        class="h-full rounded-full {{ $status['barColor'] }}"
                        style="width: {{ $percentage }}%"
                    ></div>
                </div>

                <p class="mt-2 text-xs font-medium {{ $status['percentClass'] }}">
                    {{ $percentage }}% of pipeline
                </p>
            </div>
        @endforeach
    </div>
</section>