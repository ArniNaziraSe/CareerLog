<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobApplicationController;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $userId = auth()->id();

        $totalApplications = JobApplication::where('user_id', $userId)->count();

        $acceptedApplications = JobApplication::where('user_id', $userId)
            ->where('status', 'accepted')
            ->count();

        $rejectedApplications = JobApplication::where('user_id', $userId)
            ->where('status', 'rejected')
            ->count();

        $ghostedApplications = JobApplication::where('user_id', $userId)
            ->where('status', 'ghosted')
            ->count();

        $appliedCount = JobApplication::where('user_id', $userId)
            ->where('status', 'applied')
            ->count();

        $screeningCount = JobApplication::where('user_id', $userId)
            ->where('status', 'screening')
            ->count();

        $interviewCount = JobApplication::where('user_id', $userId)
            ->where('status', 'interview')
            ->count();

        $testCount = JobApplication::where('user_id', $userId)
            ->where('status', 'test')
            ->count();

        $offeredCount = JobApplication::where('user_id', $userId)
            ->where('status', 'offered')
            ->count();
        
        $recentApplications = JobApplication::with('company')
            ->where('user_id', $userId)
            ->latest()
            ->take(3)
            ->get();

        $upcomingInterviews = JobApplication::with('company')
            ->where('user_id', $userId)
            ->whereNotNull('interview_date')
            ->whereDate('interview_date', '>=', now()->toDateString())
            ->orderBy('interview_date')
            ->take(3)
            ->get();

        return view('dashboard', compact(
            'totalApplications',
            'acceptedApplications',
            'rejectedApplications',
            'ghostedApplications',
            'appliedCount',
            'screeningCount',
            'interviewCount',
            'testCount',
            'offeredCount',
            'recentApplications',
            'upcomingInterviews',
        ));
    })->name('dashboard');

    Route::resource('companies', CompanyController::class);

    Route::resource('job-applications', JobApplicationController::class)
        ->parameters([
            'job-applications' => 'application',
        ]);
});

require __DIR__.'/auth.php';