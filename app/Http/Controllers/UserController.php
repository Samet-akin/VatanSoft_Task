<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list()
    {
    $users =UserModel::all();

    return $users;
    }

    public function insert(Request $request)
    {
        $user = new UserModel();
        $user->adi = $request['adi'];
        $user->soyadi = $request['soyadi'];
        $user->save();
        return $user;
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'adi' => 'required|string|max:255',
            'soyadi' => 'required|string|max:255',
        ]);

        $user = UserModel::findOrFail($id);
        $user->adi = $validatedData['adi'];
        $user->soyadi = $validatedData['soyadi'];
        $user->save();

        return $user;

    }

    public function delete(Request $request, $id)
    {
    $user=UserModel::findOrFail($id);
    $user->delete();
    return $user;
    }

    public function destroy(Request $request, $id)
    {
        $user=UserModel::findOrFail($id);
        $user->forceDelete();
        return $user;
    }
}
