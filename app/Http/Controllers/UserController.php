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
            "password" => array( 'required', 'regex:/^[a-zA-Z]+\d*$/u')
        ]);
        if ($validator->fails()) {
            return response()->json(["message" => $validator->errors()->all()], 400);
        }
        $user = User::where("id", $id)->update([
            "password" => Hash::make($request->password),
        ]);
        return response()->json(["user" => $user]);
    }

    public function role(){
        $user = Auth::user();
        $userId = $user->id;
        $role = DB::table('users as u')
        ->select('role')
        ->where('u.id', $userId)
        ->get();
        return response()->json($role);
    }
    public function destroy(string $id)
    {
        User::find($id)->delete();
    }
}
