<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function updatePassword(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "password" => array('required', 'regex:/^[a-zA-Z]+\d*$/u')
        ]);
        if ($validator->fails()) {
            return response()->json(["message" => $validator->errors()->all()], 400);
        }
        $user = User::where("id", $id)->update([
            "password" => Hash::make($request->password),
        ]);
        return response()->json(["user" => $user]);
    }

    public function role()
    {
        $user = Auth::user();
        $userId = $user->id;
        $role = DB::table('users as u')
            ->select('role')
            ->where('u.id', $userId)
            ->get();
        return response()->json($role);
    }

    public function setRole(string $id, int $role)
    {
        return DB::table('users')
            ->where('id', $id)
            ->update(['role' => $role]);
    }

    public function update(Request $request, string $id)
    {
        $record = User::find($id);
        $record->fill($request->all());
        $record->save();
    }


    public function destroy(string $id)
    {
        User::find($id)->delete();
    }

    public function teachers()
    {
        $teacher = DB::table('users')
            ->select('*')
            ->where('role', '=', '2')
            ->get();
        return response()->json($teacher);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = $request->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json(['message' => 'A jelenlegi jelszó hibás.'], 422);
        }
        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json(['message' => 'Jelszó sikeresen frissítve.']);
    }
}
