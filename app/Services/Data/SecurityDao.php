<?php
namespace App\Services\Data;

/*CST256 Milestone 1 Version 1
Vinson Martin 5/20/2022,
User SecurityDAO Method that uses Laravel DB Facade to access CRUD functions in databas.
*/

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
            $id,
            $row->firstname,
            $row->lastname,
            $row->email,
            $row->username);
    }
    public function getUserByUsername($username): UserModel
    {
        $rows = DB::table('users')
            ->where ('username', '=', $username)->get();
        $row = $rows->first();
        return new UserModel(
            $row->id,
            $row->firstname,
            $row->lastname,
            $row->email,
            $row->username);
    }

    public function login(string $username, string $password): bool
    {
        $rows = DB::table('users')
            ->where ('username', '=', $username)->get();
        $row = $rows->first();
        if ($row == NULL) {return false;}
        else if (Hash::check($password, $row->password)) {
            return true;
        }
        else {return false;}
    }
    public function register(UserModel $user, $password)
    {
        // Assigning data from fields to variables
        DB::table('CST256Activity.users')->insert([
            'username' => $user->getUsername(),
            'firstname'=> $user->getFirstName(),
            'lastname' => $user->getLastName(),
            'email' => $user->getEmail(),
            'password' => Hash::make($password),
        ]);
    }
}
