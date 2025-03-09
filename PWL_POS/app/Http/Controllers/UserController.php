<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager_tiga',
        //     'nama' => 'Manager 3',
        //     'password' => Hash::make('12345')
        // ];
        // UserModel::create($data);
        // $user = UserModel::all();

        // $user = UserModel::findor(17, ['username', 'nama'], function () {
        //     abort(404);
        // });
        // $user = UserModel::findOrFail(1);

        try {
            $users = UserModel::Where('level_id', 2)->get();
            $userCount = UserModel::where('level_id', 2)->count();

            if ($userCount === 0) {
                return response()->json(['message' => 'No users found'], 404);
            }

            return view('user', ['userCount' => $userCount, 'data' => $users]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException) {
            return response()->json(['message' => 'No users found'], 404);
        }

        // $data = [
        //     'username' =>'Pelanggan 1'
        // ];
        // UserModel::where('username', 'customer-1')->update($data);
        // $data = UserModel::all(); //mengambil semua data dari tabel m_user
        // return view('user', ['data' => $data]);
    }
}
