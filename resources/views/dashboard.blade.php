<x-layouts.app-dashboard title="CareerLog Dashboard">
    @include('dashboard.page-header')

    @include('dashboard.stats-cards')

    @include('dashboard.pipeline-overview')

    <section class="mt-8 grid gap-8 xl:grid-cols-3">
        @include('dashboard.recent-applications')

        @include('dashboard.upcoming-interviews')
    </section>
</x-layouts.app-dashboard>