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

        // try {
        //     $users = UserModel::Where('level_id', 2)->get();
        //     $userCount = UserModel::where('level_id', 2)->count();

        //     if ($userCount === 0) {
        //         return response()->json(['message' => 'No users found'], 404);
        //     }

        //     return view('user', ['userCount' => $userCount, 'data' => $users]);
        // } catch (\Illuminate\Database\Eloquent\ModelNotFoundException) {
        //     return response()->json(['message' => 'No users found'], 404);
        // }

        // $data = [
        //     'username' =>'Pelanggan 1'
        // ];
        // UserModel::where('username', 'customer-1')->update($data);
        // $data = UserModel::all(); //mengambil semua data dari tabel m_user
        // return view('user', ['data' => $data]);

        // $user = UserModel::firstOrCreate(
        //     [
        //         'username' => 'manager33',
        //         'nama' => 'Manager Tiga Tiga',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ],
        // );
        // $user->save();
        // return view('user', ['data' => $user]);

        $user = UserModel::create([
            'username' => 'manager11',
            'nama' => 'Manager11',
            'password' => Hash::make('12345'),
            'level_id' => 2,
        ]);
        $user->username = 'manager12';
        $user->save();
        $user->wasChanged(); // true
        $user->wasChanged('username'); // true
        $user->wasChanged(['username', 'level_id']); // true
        $user->wasChanged('nama'); // false
        dd($user->wasChanged(['nama', 'username'])); // true
    }
}
