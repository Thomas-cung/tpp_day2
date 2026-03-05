<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends BaseController
{
    public function index()
    {
        $users = User::get();

        $data = UserResource::collection($users);

        return $this->success($data, "User Retrieved Successfully");
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required',
            'password' => 'required|string',
            'address' => 'nullable|string',
            'phone' => 'nullable',
            'gender' => 'required',
            'status' => 'nullable',
            'image' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->error("Validation Error", $validator->errors(), 422);
        }
        if ($request->hasFile('image')) {

            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('userImage'), $imageName);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'address' => $request->address,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'status' => $request->status ?? 1,
            'image' => $imageName
        ]);
        return $this->success($user, "User Create Successfully");
    }
}
