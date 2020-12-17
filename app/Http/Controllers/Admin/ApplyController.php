<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apply;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.apply.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return view('admin.apply.show', compact('experience'));
    }

    /**
     * Datatable Data
     *
     * @return JsonResponse
     */
    public function apply(): JsonResponse
    {
        $users = Apply::all();
        $data_table = datatables($users)
            ->addColumn(
                'status',
                static function ($jobs) {
                    return apply_data_table_status($jobs);
                }
            )
            ->addColumn('action', static function ($users) {
                return button_data_table_apply($users, 'admin.apply');
            })
            ->rawColumns(['status', 'action'])
            ->toJson();

        return $data_table;
    }
}
