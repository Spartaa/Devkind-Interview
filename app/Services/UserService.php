<?php


namespace App\Services;


use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserService extends Service
{
    public function store(UserCreateRequest $request)
    {
        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->dob = $request['dob'];
        $user->password = Hash::make($request['password']);

        return $user->save();
    }

    public function update(UserUpdateRequest $request, $user_id)
    {
        $user = User::find($user_id);

        $user->name = $request['name'];
        $user->dob = $request['dob'];

        return $user->save();

    }
    public function updatePassword(UpdatePasswordRequest $request, $user_id)
    {
        $user = User::find($user_id);

        $user->password = Hash::make($request['password']);

        return $user->save();

    }
}
