<?php

namespace App\Http\Controllers;

use App\Services\Data\EportfolioDao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Services\Data\JobsDao;

class JobListingController extends Controller
{
    public function addJobListing(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company' => ['required'],
            'title' => ['required'],
            'type' => ['required', 'int', 'min:1', 'max:2'],
            'closing_date' => ['required'],
            'description' => ['required', 'string', 'min:2', 'max:255'],
        ]);
        if ($validator->fails()) {
            return redirect('addJobListing')
                ->withErrors($validator)
                ->withInput();
        }
        $DAO = new JobsDao();
        $validated = $validator->validated();

        if ($request->route == "edit") {
            $DAO->updateJobListing($validated, $request->jobId);
        } else {
            $DAO->insertJobListing($validated);
        }
        return view ("jobListings");
    }
    public function editListing(Request $request) {
        $id = $request->id;
        $data =['id'=> $id,
            'route' => "edit",
            'textedit' => 0];
        return view ("role-admin.addJobListing")->with($data);
    }
    public function editDescription(Request $request) {
        $id = $request->id;
        $data =['id'=> $id,
            'route' => "edit",
            'textedit' => 1];
        return view ("role-admin.addJobListing")->with($data);

    }
    public function deleteListing(Request $request) {
        $id = $request->id;
        $DAO = new JobsDao();
        $DAO->deleteListing($id);

        return view ("jobListings");
    }

}
