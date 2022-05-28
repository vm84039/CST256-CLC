<?php
/*CST256 Milestone 3 Version 1
Vinson Martin 5/20/2022,
ProfileController Method that controls POST values from forms.  */

namespace App\Http\Controllers;

use App\Services\Data\ProfileDao;
use App\Services\Data\UserDao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function memberUpdate(Request $request){ //Self Service user form where member can update information

        $this->updateProfile($request, Auth::id());
        return view("home");
    }
    public function adminUpdate(Request $request){//Admin form  where admin can update user information
        $id = $request->input('id');
        $data = ['id' => $id];
        $this->updateProfile($request, $id );
        return view("role-admin.editUser")->with($data);
    }
    public function updateProfile(Request $request, $id) { //Gathers information from form and previous method to send
        // info to Profile DAO
        $validator = Validator::make($request->all(), [
            'roleId' => ['required', 'string','min:-1', 'max:255'],
            'firstname' => ['required', 'string','min:2', 'max:255'],
            'lastname' => ['required', 'string','min:2', 'max:255'],
            'address' => ['required', 'string','min:2', 'max:255'],
            'city' => ['required', 'string','min:2', 'max:255'],
            'phone' => ['required', 'string','min:10', 'max:11'],
            'state' => [ 'string','min:2', 'max:5'],
            'zip' => [ 'required','string','min:5', 'max:6'],
        ]);
        if ($validator->fails()) {
            return redirect('home')
                ->withErrors($validator)
                ->withInput();
        }
        $DAO = new ProfileDao();
        // Retrieve the validated input...
        $validated = $validator->validated();
        $DAO->updateProfile($validated, $id);
    }
    public function editUser(Request $request) { //Gathers userID from button in allUsers and sends to editUser blade
        $id = $request->input('id');
        $data = ['id' => $id];
        return view("role-admin.editUser")->with($data);
    }
    public function suspend(Request $request) { //Gathers userID from button in allUsers and sends to UserDao to make
        // inactive in database
        $id = $request->input('id');
        $DAO = new UserDao();
        $DAO->suspend($id);
        $data = ['id' => $id];
        return view("role-admin.allUsers")->with($data);
    }
    public function activate(Request $request) {  //Gathers userID from button in allUsers and sends to UserDao to make
        // active in database
        $id = $request->input('id');
        $DAO = new UserDao();
        $DAO->activate($id);
        $data = ['id' => $id];
        return view("role-admin.allUsers")->with($data);
    }
    public function delete(Request $request) {//Gathers userID from button in allUsers and sends to UserDao to delete
        // user from database
        $id = $request->input('id');
        $DAO = new UserDao();
        $DAO->delete($id);
        $data = ['id' => $id];
        return view("role-admin.allUsers")->with($data);
    }



}
