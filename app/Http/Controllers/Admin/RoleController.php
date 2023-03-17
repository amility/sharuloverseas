<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Spatie\Permission\Models\Permission;
use App\Repositories\RoleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Spatie\Permission\Models\Role;

class RoleController extends AppBaseController
{

    /** @var  RoleRepository */
    private $roleRepository;

    public function __construct(RoleRepository $roleRepo)
    {
        $this->roleRepository = $roleRepo;
    }

    /**
     * Display a listing of the Role.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $roles = $this->roleRepository->all();

        return view('admin.roles.index')
            ->with('roles', $roles);
    }

    /**
     * Show the form for creating a new Role.
     *
     * @return Response
     */
    public function create()
    {
        $permissions = Permission::all();

        return view('admin.roles.create')->with([
            'permissions' => $permissions
        ]);
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param CreateRoleRequest $request
     * @return Response
     */
    public function store(CreateRoleRequest $request)
    {
        $input = $request->except('roles');
        $permissions = $request->get('permissions');
        $input[ 'guard_name' ] = 'web';
        $role = $this->roleRepository->create($input);

        $role->givePermissionTo($permissions);

        Flash::success('Role saved successfully.');

        return redirect(route('roles.index'));
    }

    /**
     * Display the specified Role.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $role = $this->roleRepository->allQuery()->with('permissions')->find($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

        return view('admin.roles.show')->with('role', $role);
    }

    /**
     * Show the form for editing the specified Role.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $role = $this->roleRepository->allQuery()->with('permissions')->find($id);

        $permissions = Permission::all();

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

        return view('admin.roles.edit')->with([
            'role'        => $role,
            'permissions' => $permissions
        ]);
    }

    /**
     * Update the specified Role in storage.
     *
     * @param int               $id
     * @param UpdateRoleRequest $request
     * @return Response
     */
    public function update($id, Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                //'guard_name' => 'required|string|max:255',
                'created_at' => 'nullable',
                'updated_at' => 'nullable'
            ]);
            $role = $this->roleRepository->find($id);

            if (empty($role)) {
                Flash::error('Role not found');

                return redirect(route('roles.index'));
            }

            $role = $this->roleRepository->update($request->except('permissions'), $id);

            if ($request->has('permissions')) {
                $permissions = $request->get('permissions');
                foreach ($permissions as $permissionName) {
                    $newPermissions[] = Permission::findOrCreate($permissionName);
                }

                $role->syncPermissions($newPermissions);
            } else {
                Flash::error('Please select Permission');

                return redirect(route('roles.edit', $id));
            }

            Flash::success('Role updated successfully.');

            return redirect(route('roles.index'));
        } catch (\Throwable $e) {
            dd($e);
        }
    }

    /**
     * Remove the specified Role from storage.
     *
     * @param int $id
     * @return Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

        $this->roleRepository->delete($id);

        Flash::success('Role deleted successfully.');

        return redirect(route('roles.index'));
    }
}
