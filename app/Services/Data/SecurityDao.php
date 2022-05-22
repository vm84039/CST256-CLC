<?php
namespace App\Services\Data;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class SecurityDao{
    public function getUser($id): UserModel
    {
        $rows = DB::table('users')
            ->where ('id', '=', $id)->get();
        $row = $rows->first();
        return new UserModel(
            $row->id,
            $row->firstname,
            $row->lastname,
            $row->email,
            $row->username);
    }
    public function login($credentials) {

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return true; }
        // Authentication failed...
        return false;
    }
    public function register($data)
    {
        return User::create([
            'username' => $data['username'],
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
