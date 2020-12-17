<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Degree;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JobStoreRequest;
use App\Http\Requests\Admin\JobUpdateRequest;
use App\Models\Experience;
use App\Models\Job;
use App\Models\ProgramStudy;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.job.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $educations      = Degree::toSelectArray();
        $experiences     = Experience::pluck('name', 'id');
        $program_studies = ProgramStudy::pluck('name', 'id');

        return view('admin.job.create', compact('educations', 'experiences', 'program_studies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param JobStoreRequest $request
     * @return RedirectResponse
     */
    public function store(JobStoreRequest $request): RedirectResponse
    {
        $job = new Job();
        $job->fill($request->only(
            'name',
            'function',
            'description',
            'minimum_age',
            'maximum_age',
            'education_id',
            'published'
        ));
        $job->open  = Carbon::parse($request->input('start'));
        $job->close = Carbon::parse($request->input('end'));
        $job->experience()->associate($request->input('experience_id'));
        $job->programStudy()->associate($request->input('program_study_id'));
        $job->save();

        return redirect()->route('admin.job.index')->with('alert', [
            'alert' => 'success',
            'message' => 'Job Data Successfully Stored!'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Job $job
     * @return Factory|View
     */
    public function edit(Job $job)
    {
        $educations      = Degree::toSelectArray();
        $experiences     = Experience::pluck('name', 'id');
        $program_studies = ProgramStudy::pluck('name', 'id');

        return view('admin.job.edit', compact('job', 'educations', 'experiences', 'program_studies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param JobUpdateRequest $request
     * @param Job $job
     * @return RedirectResponse
     */
    public function update(JobUpdateRequest $request, Job $job): RedirectResponse
    {
        $job->fill($request->only(
            'name',
            'function',
            'description',
            'minimum_age',
            'maximum_age',
            'education_id',
            'published'
        ));
        $job->open  = Carbon::parse($request->input('start'));
        $job->close = Carbon::parse($request->input('end'));
        $job->experience()->associate($request->input('experience_id'));
        $job->programStudy()->associate($request->input('program_study_id'));
        $job->save();

        return redirect()->route('admin.job.index')->with('alert', [
            'alert' => 'success',
            'message' => 'Job Data Successfully Updated!'
        ]);
    }
    public function destroy($id): RedirectResponse
    {
       
       
         $job = job::findOrFail($id);
        $job->delete();

        return redirect()->route('admin.job.index')->with('alert', [
            'alert' => 'success',
            'message' => 'User Data Successfully Removed !'
        ]);
    }


    /**
     * Datatable Data
     *
     * @return JsonResponse
     */
    public function dataTable(): JsonResponse
    {
        $jobs = Job::latest('updated_at')
            ->latest('created_at')
            ->latest('published')
            ->get();

        $data_table = datatables($jobs)
            ->addColumn(
                'status',
                static function ($jobs) {
                    return job_data_table_status($jobs);
                }
            )
            ->addColumn('action', static function ($users) {
                return button_data_table($users, 'admin.job');
            })
            ->rawColumns(['action', 'status'])
            ->toJson();

        return $data_table;
    }
}
