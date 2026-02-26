<?php

namespace App\Repositories\Role;

use Spatie\Permission\Models\Role;
use App\Repositories\Role\RoleRepositoryInterface;

class RoleRepository implements RoleRepositoryInterface
{
    public function index()
    {
        return Role::all();
    }
    public function store($data)
    {
        return Role::create($data);
    }
    public function show($id)
    {

        return Role::find($id);
    }
}
