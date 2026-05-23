<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = JobApplication::with('company')
            ->where('user_id', Auth::id());

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('work_model')) {
            $query->where('work_model', $request->work_model);
        }

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('position', 'ilike', '%' . $request->search . '%')
                    ->orWhereHas('company', function ($companyQuery) use ($request) {
                        $companyQuery->where('name', 'ilike', '%' . $request->search . '%');
                    });
            });
        }

        $applications = $query->latest()->paginate(10);

        return view('job-applications.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::where('user_id', Auth::id())
            ->orderBy('name')
            ->get();

        return view('job-applications.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'position' => 'required|string|max:255',
            'applied_date' => 'required|date',
            'status' => 'required|string|max:50',
            'source' => 'nullable|string|max:255',
            'salary' => 'nullable|integer|min:0',
            'work_model' => 'required|string|max:50',
            'interview_date' => 'nullable|date',
            'notes' => 'nullable|string',
        ]);

        $company = Company::where('id', $validated['company_id'])
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $validated['user_id'] = Auth::id();
        $validated['company_id'] = $company->id;

        JobApplication::create($validated);

        return redirect()
            ->route('job-applications.index')
            ->with('success', 'Application added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(JobApplication $application)
    {
        $this->authorizeApplication($application);

        $application->load('company');

        return view('job-applications.show', compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobApplication $application)
    {
        $this->authorizeApplication($application);

        $companies = Company::where('user_id', Auth::id())
            ->orderBy('name')
            ->get();

        return view('job-applications.edit', compact('application', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobApplication $application)
    {
        $this->authorizeApplication($application);

        $validated = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'position' => 'required|string|max:255',
            'applied_date' => 'required|date',
            'status' => 'required|string|max:50',
            'source' => 'nullable|string|max:255',
            'salary' => 'nullable|integer|min:0',
            'work_model' => 'required|string|max:50',
            'interview_date' => 'nullable|date',
            'notes' => 'nullable|string',
        ]);

        $company = Company::where('id', $validated['company_id'])
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $validated['company_id'] = $company->id;

        $application->update($validated);

        return redirect()
            ->route('job-applications.index')
            ->with('success', 'Application updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobApplication $application)
    {
        $this->authorizeApplication($application);

        $application->delete();

        return redirect()
            ->route('job-applications.index')
            ->with('success', 'Application deleted successfully.');
    }

    private function authorizeApplication(JobApplication $application): void
    {
        if ($application->user_id !== Auth::id()) {
            abort(403);
        }
    }
}
