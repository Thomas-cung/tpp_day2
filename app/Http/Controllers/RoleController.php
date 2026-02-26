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
        $data = $request->validate([
            'name' => 'required|unique:roles,name'
        ]);

        $this->roleRepository->store($data);

        return redirect()->route('roles.index');
    }

    public function edit($id)
    {
        $role = $this->roleRepository->show($id);
        $permissions = Permission::all();

        return view('roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required'
        ]);

        $role = $this->roleRepository->show($id);

        return redirect()->route('roles.index');
    }

    public function delete($id)
    {
        $role = $this->roleRepository->show($id);

        return redirect()->route('roles.index');
    }
}
