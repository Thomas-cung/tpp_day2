<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Role\RoleRepositoryInterface;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    protected $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        $roles = $this->roleRepository->index();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
        // return view('roles.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required|unique:roles,name'
        ]);

        $role = $this->roleRepository->store($data);

        $role->permissions()->sync($request['permission']);

        return redirect()->route('roles.index');
    }

    public function edit($id)
    {
        $role = $this->roleRepository->show($id);

        $rolePermissions = $role->permissions->pluck('id')->toArray();

        // dd($rolePermissions);
        // dd($role);
        $permissions = Permission::all();
        // dd($permissions);


        return view('roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required',
            'permission' => 'required|array'
        ]);


        $role = $this->roleRepository->show($id);
        $role->permissions()->sync($request['permission']);

        return redirect()->route('roles.index');
    }


    public function delete($id)
    {
        $role = $this->roleRepository->show($id);

        return redirect()->route('roles.index');
    }
}
