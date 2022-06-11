<?php
/*CST256 Milestone 3 Version 1
Vinson Martin 5/20/2022,
ProfileController Method that controls POST values from forms.  */

namespace App\Http\Controllers;

use App\Services\Data\AffinityDao;
use App\Services\Data\UserDao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\AffinityReferenceModel;

class AffinityController extends Controller
{

// ***********************Member Methods************************
    public function joinAffinity (Request $request){
        $DAO = new AffinityDao();
        $affinityId = $request->input('affinityId');
        $DAO->insertAffinity($affinityId, Auth::id());
        $data =[ 'affinityId' => $affinityId];
        return view("affinityList")->with($data);
    }
    public function removeAffinity (Request $request){
        $DAO = new AffinityDao();
        $affinityId = $request->input('affinityId');
        $DAO->removeAffinity($affinityId, Auth::id());
        return view("affinity");
    }
    public function memberList (Request $request){
        $affinityId = $request->input('affinityId');
        $data =[ 'affinityId' => $affinityId];
        return view("affinityList")->with($data);
    }

// ***********************Admin Methods************************

    public function validateAddAffinityGroup(Request $request): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($request->all(), [
            'name' => ['required', 'unique:affinity_reference'],
            'description' => ['required', 'string', 'min:2', 'max:520'],
        ]);
    }
    public function validateEditAffinityGroup(Request $request): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($request->all(), [
            'name' => ['required'],
            'description' => ['required', 'string', 'min:2', 'max:520'],
        ]);
    }
    public function saveAffinityGroup(Request $request){

        if ($request->id == "-1"){ $validator = $this->validateAddAffinityGroup($request);}

        else {$validator = $this->validateEditAffinityGroup($request);}

        if ($validator->fails()) {
            return redirect('addAffinityGroup')
                ->withErrors($validator)
                ->withInput();
        }
        $validated = $validator->validated();
        $DAO = new AffinityDao();
        if ($request->id == "-1")
        {
            $DAO->insertAffinityReference($validated);
        }
        else {
            $model = new AffinityReferenceModel($request->id, $validated['name'], $validated['description'], $request->image);
            $DAO->updateAffinityReference($model);
        }
        return view ("affinity");

    }
    public function editAffinityGroup(Request $request) {
        $id = $request->id;
        $edit = $request->edit;
        $data =['id'=> $id,
            'edit' => $edit,
            'textedit' => 0];
        return view ("role-admin.editAffinityGroup")->with($data);
    }
    public function cancelEditAffinity(Request $request) {
        $id = $request->id;
        $edit = "none";
        $data =['id'=> $id,
            'edit' => $edit];
        return view ("role-admin.editAffinityGroup")->with($data);
    }
    public function deleteAffinityGroup(Request $request) {
        $id = $request->id;
        $DAO = new AffinityDao();
        $DAO->deleteAffinityGroup($id);
        return view ("affinity");
    }
}
