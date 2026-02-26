<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Permission\PermissionRepository;
use App\Repositories\Permission\PermissionRepositoryInterface;

class PermissionController extends Controller
{
    protected $permissionRepository;

    public function __construct(PermissionRepositoryInterface $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function index()
    {
        $permissions = $this->permissionRepository->index();
        return view('permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|unique:permissions,name',
            'guard_name' => 'nullable|string',
        ]);

        $this->permissionRepository->store($data);

        return redirect()->route('permissions.index');
    }

    public function edit($id)
    {
        $permission = $this->permissionRepository->show($id);

        return view('permissions.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'guard_name' => 'nullable|string',
        ]);

        $this->permissionRepository->show($id);

        return redirect()->route('permissions.index');
    }

    public function delete($id)
    {
        $this->permissionRepository->show($id);

        return redirect()->route('permissions.index');
    }
}
