<?php

namespace App\Http\Controllers;

use App\Services\Data\SecurityDao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function memberUpdate(Request $request){

        $this->updateProfile($request, Auth::id());
        return view("home");
    }
    public function adminUpdate(Request $request){
        $id = $request->input('id');
        $data = ['id' => $id];
        $this->updateProfile($request, $id );
        return view("role-admin.editUser")->with($data);
    }
    public function updateProfile(Request $request, $id) {
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
        $DAO = new SecurityDao();
        // Retrieve the validated input...
        $validated = $validator->validated();
        $DAO->updateProfile($validated, $id);
    }
    public function editUser(Request $request) {
        $id = $request->input('id');
        $data = ['id' => $id];
        return view("role-admin.editUser")->with($data);
    }
    public function suspend(Request $request) {
        $id = $request->input('id');
        $DAO = new SecurityDao();
        $DAO->suspend($id);
        $data = ['id' => $id];
        return view("role-admin.allUsers")->with($data);
    }
    public function activate(Request $request) {
        $id = $request->input('id');
        $DAO = new SecurityDao();
        $DAO->activate($id);
        $data = ['id' => $id];
        return view("role-admin.allUsers")->with($data);
    }
    public function delete(Request $request) {
        $id = $request->input('id');
        $DAO = new SecurityDao();
        $DAO->delete($id);
        $data = ['id' => $id];
        return view("role-admin.allUsers")->with($data);
    }



}
