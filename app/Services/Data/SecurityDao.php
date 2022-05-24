<?php
namespace App\Services\Data;

use App\Models\ProfileModel;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class SecurityDao{

//   ***************************User DAO******************************
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
            $row->username,
            $row->roleId,
            $row->active
        );
    }
    public function register($data)
    {
        return User::create([
            'username' => $data['username'],
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'roleId' => 1,
        ]);
    }
    public function suspend($id){
        $affectedUser = DB::table('users')
            ->where('id', $id)
            ->update(
                ['active' => 0],
            );
    }
    public function activate($id){
        $affectedUser = DB::table('users')
            ->where('id', $id)
            ->update(
                ['active' => 1],
            );
    }
    public function delete($id){
        $affectedUser = DB::table('users')
            ->where('id', $id)
            ->delete();
    }

    public function getRoleByRoleId($roleId): string
    {
        if ($roleId == 1) {return "Member";}
        if ($roleId == 2) {return "Admin";}
        else {return "unknown";}
    }
    public function getAllUsers(): \Illuminate\Support\Collection
    {
        return DB::table('users')
            ->select('id', 'firstname', 'lastname','email','username', 'roleId', 'active')
            ->get();
    }



    //   ***************************Profile DAO******************************
    public function getProfile($id)
    {

        $rows = DB::table('profile')
            ->where ('id', '=', $id)->get();
        if ($rows->count() == 0){
            $profile = new ProfileModel();
            $profile->setID($id);
            DB::table('profile')->insert([
                'id' => $id,
                'address' => $profile->getAddress(),
                'city' => $profile->getCity(),
                'state' => $profile->getState(),
                'zip' => $profile->getZip(),
                'phone' => $profile->getPhone(),
                'dob' => $profile->getDob(),
            ]);
        }
        else {
            $row = $rows->first();
            $profile = new ProfileModel();
            $profile->setId($row->id);
            $profile->setAddress($row->address);
            $profile->setCity($row->city);
            $profile->setState($row->state);
            $profile->setZip($row->zip);
            $profile->setPhone($row->phone);
            $profile->setDob($row->dob);
        }
        return $profile;
    }
    public function updateProfile($validated, $id): void
    {
        if($validated['roleId'] == 2) {
            $roleId = 2;
        }
        else {
            $roleId = 1;
        }
        $affectedUser = DB::table('users')
            ->where('id', $id)
            ->update(
                ['firstname' => $validated['firstname'],'lastname' => $validated['lastname'], 'roleId' => $roleId],
            );
        $affectedProfile = DB::table('profile')
            ->where('id', $id)
            ->update(
                ['address' => $validated['address'], 'city' => $validated['city'],
                'state' => $validated['state'], 'phone' => $validated['phone'], 'zip'=>$validated['zip']]
          //      ['dob' => $validated['dob']],
            );;
    }
}
