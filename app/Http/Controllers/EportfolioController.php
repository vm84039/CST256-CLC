<?php
/*CST256 Milestone 3 Version 1
Vinson Martin 5/20/2022,
EportfoloController Method that controls POST values from forms.  */
namespace App\Http\Controllers;

use App\Services\Data\EportfolioDao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EportfolioController extends Controller
{
    public function addJob(Request $request){//retrieves info from addJob blade,
        $validator = Validator::make($request->all(), [
            'start' => ['required'],
            'end' => ['required'],
            'employer' => ['required', 'string','min:2', 'max:255'],
            'jobTitle' => ['required', 'string','min:2', 'max:255'],
            'description' => ['required', 'string','min:2', 'max:255'],
        ]);
        if ($validator->fails()) {
            return redirect('addJob')
                ->withErrors($validator)
                ->withInput();
        }
        $DAO = new EportfolioDao();
        $validated = $validator->validated();
        $DAO->insertJob($validated, Auth::id());

        return view ("role-user.eportfolio");
    }
    public function addSkills(Request $request){

        $skillId = $request->skillID;
        $DAO = new EportfolioDao();
        $DAO->insertUserSkills($skillId, Auth::id());

        return view ("role-user.eportfolio");
    }
    public function deleteSkill(Request $request) {
        $id = $request->id;
        $DAO = new EportfolioDao();
        $DAO->deleteSkill($id);

        return view ("role-user.eportfolio");
    }
    public function addEducation(Request $request){
        $validator = Validator::make($request->all(), [
            'date' => ['required'],
            'school' => ['required', 'string','min:2', 'max:255'],
            'type' => ['required', 'int','min:1', 'max:5'],
            'study' => ['required', 'string','min:2', 'max:255'],
        ]);
        if ($validator->fails()) {
            return redirect('addEducation')
                ->withErrors($validator)
                ->withInput();
        }
        $DAO = new EportfolioDao();
        $validated = $validator->validated();
        $DAO->insertEducation($validated, Auth::id());

        return view ("role-user.eportfolio");
    }
    public function deleteEducation(Request $request) {
        $id = $request->id;
        $DAO = new EportfolioDao();
        $DAO->deleteEducation($id);

        return view ("role-user.eportfolio");
    }
    public function deleteJob(Request $request) {
        $id = $request->id;
        $DAO = new EportfolioDao();
        $DAO->deleteJob($id);

        return view ("role-user.eportfolio");
    }





}
