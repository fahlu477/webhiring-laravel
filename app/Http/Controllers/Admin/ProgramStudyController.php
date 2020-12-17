<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ProgramStudyStoreRequest;
use App\Http\Requests\Admin\ProgramStudyUpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\ProgramStudy;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProgramStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.program_study.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.program_study.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProgramStudyStoreRequest $request
     * @return RedirectResponse
     */
    public function store(ProgramStudyStoreRequest $request): RedirectResponse
    {
        $experience = new ProgramStudy();
        $experience->fill($request->only('name'));
        $experience->save();

        return redirect()->route('admin.program_study.index')->with('alert', [
            'alert' => 'success',
            'message' => 'Program Study Data Successfully Stored!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param ProgramStudy $program_study
     * @return Factory|View
     */
    public function show(ProgramStudy $program_study)
    {
        return view('admin.program_study.show', compact('program_study'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ProgramStudy $program_study
     * @return Factory|View
     */
    public function edit(ProgramStudy $program_study)
    {
        return view('admin.program_study.edit', compact('program_study'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProgramStudyUpdateRequest $request
     * @param ProgramStudy $program_study
     * @return RedirectResponse
     */
    public function update(ProgramStudyUpdateRequest $request, ProgramStudy $program_study): RedirectResponse
    {
        $program_study->fill($request->only('name'));
        $program_study->save();

        return redirect()->route('admin.program_study.index')->with('alert', [
            'alert' => 'success',
            'message' => 'Program Study Data Successfully Updated!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $experience = ProgramStudy::findOrFail($id);
        $experience->delete();

        return redirect()->route('admin.program_study.index')->with('alert', [
            'alert' => 'success',
            'message' => 'Program Study Data Successfully Removed !'
        ]);
    }

    /**
     * Datatable Data
     *
     * @return JsonResponse
     */
    public function dataTable(): JsonResponse
    {
        $program_studies = ProgramStudy::all();
        $data_table = datatables($program_studies)
            ->addColumn('action', static function ($users) {
                return button_data_table($users, 'admin.program_study');
            })
            ->rawColumns(['action'])
            ->toJson();

        return $data_table;
    }
}
