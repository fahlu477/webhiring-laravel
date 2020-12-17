<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UserStoreRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use App\Models\UserProfile;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\MassAssignmentException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id');

        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserStoreRequest $request
     * @return RedirectResponse
     * @throws MassAssignmentException
     */
    public function store(UserStoreRequest $request)
    {
        $user = new User();
        $user->fill($request->except(['_token', 'role_id']));
        $user->email_verified_at = now();
        $user->save();
        $profile = new UserProfile();
        $user->profile()->save($profile);
        $user->roles()->sync($request->input('role_id', []));

        return redirect()->route('admin.user.index')->with('alert', [
            'alert' => 'success',
            'message' => 'User Data Successfully Stored!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Factory|View
     */
    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Factory|View
     */
    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'id');
        $user_roles = $user->roles->pluck('id')->toArray();

        return view('admin.user.edit', compact('user', 'roles', 'user_roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest $request
     * @param User $user
     * @return RedirectResponse
     * @throws MassAssignmentException
     */
    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        $user->fill($request->except('_token', '_method', 'role_id'));
        $user->roles()->sync($request->input('role_id', []));
        $user->save();

        return redirect()->route('admin.user.index')->with('alert', [
            'alert' => 'success',
            'message' => 'User Data Successfully Updated!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @var $user User
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->profile()->delete();
        $user->roles()->delete();
        $user->delete();

        return redirect()->route('admin.user.index')->with('alert', [
            'alert' => 'success',
            'message' => 'User Data Successfully Removed !'
        ]);
    }

    /**
     * Datatable Data
     *
     * @return JsonResponse
     */
    public function user(): JsonResponse
    {
        $users = User::all();
        $data_table = datatables($users)
            ->addColumn('role', static function ($users) {
                return user_data_table_role($users);
            })
            ->addColumn('action', static function ($users) {
                return button_data_table($users, 'admin.user');
            })
            ->rawColumns(['role', 'action'])
            ->toJson();

        return $data_table;
    }
}
