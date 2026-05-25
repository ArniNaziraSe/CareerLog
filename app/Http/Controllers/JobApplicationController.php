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
            ->where('user_id', auth()->id());

        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q->where('position', 'ilike', '%' . $search . '%')
                    ->orWhere('source', 'ilike', '%' . $search . '%')
                    ->orWhereHas('company', function ($companyQuery) use ($search) {
                        $companyQuery->where('name', 'ilike', '%' . $search . '%');
                    });
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('work_model')) {
            $query->where('work_model', $request->work_model);
        }

        $applications = $query->latest()->paginate(10)->withQueryString();

        $companies = Company::where('user_id', auth()->id())
            ->orderBy('name')
            ->get();

        return view('job-applications.index', compact('applications', 'companies'));
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
            'company_id' => ['required', 'exists:companies,id'],
            'position' => ['required', 'string', 'max:255'],
            'applied_date' => ['required', 'date'],
            'status' => ['required', 'in:applied,screening,interview,test,offered,accepted,rejected,ghosted'],
            'source' => ['nullable', 'string', 'max:255'],
            'salary' => ['nullable', 'integer'],
            'work_model' => ['required', 'in:remote,hybrid,onsite,full_time,part_time,internship,contract'],
            'interview_date' => ['nullable', 'date'],
            'notes' => ['nullable', 'string'],
        ]);

        $companyBelongsToUser = Company::where('id', $validated['company_id'])
            ->where('user_id', Auth::id())
            ->exists();

        abort_if(! $companyBelongsToUser, 403);

        $validated['user_id'] = auth()->id();

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
        abort_if($application->user_id !== Auth::id(), 403);

        $validated = $request->validate([
            'company_id' => ['required', 'exists:companies,id'],
            'position' => ['required', 'string', 'max:255'],
            'applied_date' => ['required', 'date'],
            'status' => ['required', 'in:applied,screening,interview,test,offered,accepted,rejected,ghosted'],
            'source' => ['nullable', 'string', 'max:255'],
            'salary' => ['nullable', 'integer'],
            'work_model' => ['required', 'in:remote,hybrid,onsite,full_time,part_time,internship,contract'],
            'interview_date' => ['nullable', 'date'],
            'notes' => ['nullable', 'string'],
        ]);

        $companyBelongsToUser = Company::where('id', $validated['company_id'])
            ->where('user_id', Auth::id())
            ->exists();

        abort_if(! $companyBelongsToUser, 403);

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
        abort_if((int) $application->user_id !== (int) auth()->id(), 403);

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
