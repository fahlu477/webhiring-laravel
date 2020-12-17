<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    /**
     * Show the application dashboard.`
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $jobs = Job::search($request)
            ->published()
            ->paginate(5);

        return view('career.index', compact('jobs'));
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return void
     */
    public function show($id)
    {
        $job = Job::findOrFail($id);

        return view('career.show', compact('job'));
    }

    /**
     * Show the application dashboard.`
     *
     * @return void
     */
    public function apply()
    {
        return view('karir');
    }
}
