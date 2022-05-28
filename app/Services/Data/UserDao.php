<?php
/*CST256 Milestone 1 Version 1
Vinson Martin 5/20/2022,
UserDao Method that access user table from database.  */


namespace App\Services\Data;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserDao
{
//   ***************************User DAO******************************
    public function getUser($id): UserModel //Retrieves user with UserID
    {
        $rows = DB::table('users')
            ->where('id', '=', $id)->get();
        $row = $rows->first();
        return new UserModel(
            $row->id,
            $row->firstname,
            $row->lastname,
            $row->email,
            $row->username,
            $row->roleId,
            $row->active
        );
    }

    public function register($data) //Inserts new user into database
    {
        return User::create([
            'username' => $data['username'],
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function suspend($id) //Addin function to logically delete user account
    {
        $affectedUser = DB::table('users')
            ->where('id', $id)
            ->update(
                ['active' => 0],
            );
    }

    public function activate($id)//Addin function to logically activate logically deleted user account
    {
        $affectedUser = DB::table('users')
            ->where('id', $id)
            ->update(
                ['active' => 1],
            );
    }

    public function delete($id)//Delete user account from database
    {
        $affectedUser = DB::table('users')
            ->where('id', $id)
            ->delete();
    }

    public function getRoleByRoleId($roleId): string//Uses UserId to retieve wheter a user  is a  member or admin
    {
        if ($roleId == 1) {
            return "Member";
        }
        if ($roleId == 2) {
            return "Admin";
        } else {
            return "unknown";
        }
    }

    public function getAllUsers(): \Illuminate\Support\Collection //Retrieves all users and places in collection
    {
        return DB::table('users')
            ->select('id', 'firstname', 'lastname', 'email', 'username', 'roleId', 'active')
            ->get();
    }
}
