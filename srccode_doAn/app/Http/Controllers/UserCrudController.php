<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class UserCrudController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return view('crud_user.crud_user', compact('users'));
    }
    public function create()
    {
        return view('crud_user.UserCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'account_type' => 'required',
            'user_id' => 'required|unique:users,user_id',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'address' => 'nullable',
            'phone' => 'nullable',
            'role' => 'required',
        ]);

        User::create($request->all());

        return redirect()->route('users.index')->with('success', 'Người dùng đã được thêm thành công!');
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('crud_user.UserEdit', compact('user'));
    }

    public function deleteUser($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('users.index')->with('success', 'Xoá người dùng thành công!');
}
public function updateUser(Request $request, $id)
{
    $user = User::findOrFail($id);
    $user->update($request->all());

    return redirect()->route('users.index')->with('success', 'Cập nhật người dùng thành công!');
}


    



public function postUser(Request $request)
{
    $validated = $request->validate([
        'account_type' => 'required|string',
        'user_id' => 'required|string|unique:users,user_id',
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'address' => 'nullable|string',
        'phone' => 'nullable|string',
        'role' => 'nullable|string',
        'password' => 'required|string|min:6',
    ]);

    $validated['password'] = Hash::make($validated['password']);

    User::create($validated);

    return redirect()->route('users.index')->with('success', 'Thêm người dùng thành công!');
}

}
