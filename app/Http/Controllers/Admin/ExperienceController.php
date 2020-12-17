<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ExperienceStoreRequest;
use App\Http\Requests\Admin\ExperienceUpdateRequest;
use App\Models\Experience;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\MassAssignmentException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.experience.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.experience.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ExperienceStoreRequest $request
     * @return RedirectResponse
     * @throws MassAssignmentException
     */
    public function store(ExperienceStoreRequest $request): RedirectResponse
    {
        $experience = new Experience();
        $experience->fill($request->except(['_token']));
        $experience->save();

        return redirect()->route('admin.experience.index')->with('alert', [
            'alert' => 'success',
            'message' => 'Experience Data Successfully Stored!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Experience $experience
     * @return Factory|View
     */
    public function show(Experience $experience)
    {
        return view('admin.experience.show', compact('experience'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Experience $experience
     * @return Factory|View
     */
    public function edit(Experience $experience)
    {
        return view('admin.experience.edit', compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ExperienceUpdateRequest $request
     * @param Experience $experience
     * @return RedirectResponse
     */
    public function update(ExperienceUpdateRequest $request, Experience $experience): RedirectResponse
    {
        $experience->fill($request->except('_token', '_method'));
        $experience->save();

        return redirect()->route('admin.experience.index')->with('alert', [
            'alert' => 'success',
            'message' => 'Experience Data Successfully Updated!'
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
        $experience = Experience::findOrFail($id);
        $experience->delete();

        return redirect()->route('admin.experience.index')->with('alert', [
            'alert' => 'success',
            'message' => 'Experience Data Successfully Removed !'
        ]);
    }

    /**
     * Datatable Data
     *
     * @return JsonResponse
     */
    public function experience(): JsonResponse
    {
        $users = Experience::all();
        $data_table = datatables($users)
            ->addColumn('action', static function ($users) {
                return button_data_table($users, 'admin.experience');
            })
            ->rawColumns(['action'])
            ->toJson();

        return $data_table;
    }
}
