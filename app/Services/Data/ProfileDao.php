<?php
namespace App\Services\Data;

use App\Models\ProfileModel;
use Illuminate\Support\Facades\DB;

class ProfileDao {

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
