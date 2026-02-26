<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }
    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'address'  => 'nullable|string',
            'phone'    => 'nullable|string',
            'gender'   => 'required|in:male,female,other',
            'status'   => 'nullable',
            'image'    => 'required',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('userImage'), $imageName);
            $data['image'] = $imageName;
        }

        $data['status'] = $request->has('status') ? true : false;
        $data['password'] = Hash::make($data['password']);

        // User::create($data);
        $this->userRepository->store($data);
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = $this->userRepository->show($id);
        $roles = Role::all();
        // dd($role);
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name'    => 'required|string',
            'email'   => 'required|email|unique:users,email,' . $id,
            'address' => 'nullable|string',
            'phone'   => 'nullable|string',
            'gender'  => 'required|in:male,female,other',
            'status'  => 'nullable',
            'image'   => 'nullable|image',
        ]);

        // $user = User::findOrFail($id);
        $data['role_id'] = $request->role_id;
        $user = $this->userRepository->show($id);


        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('userImages'), $imageName);
            $data['image'] = $imageName;
        } else {
            unset($data['image']);
        }

        $data['status'] = $request->has('status') ? true : false;

        $user->update($data);
        $user->syncRoles([$request->role]);
        return redirect()->route('users.index');
    }

    public function delete($id)
    {
        // User::findOrFail($id)->delete();
        $user = $this->userRepository->show($id);
        return redirect()->route('users.index');
    }
}
