<?php
namespace App\Services\Data;

use App\Models\JobModel;
use Illuminate\Support\Facades\DB;

class JobsDao{
    public function getAllJobs(): \Illuminate\Support\Collection
    {
        return DB::table('joblistings')
            ->select('id', 'company', 'title', 'type', 'description', 'closing_date')
            ->orderBy('closing_date', 'asc')
            ->get();
    }
    public function getJob($id): JobModel
    {
        $rows = DB::table('joblistings')
            ->where('id', '=', $id)
            ->get();
        $row = $rows->first();
        return new JobModel($id, $row->company, $row->title, $row->type, $row->description, $row->closing_date);

    }
    public function  insertJobListing($validated){

            DB::table('joblistings')->insert([
                'company' => $validated['company'],
                'title' => $validated['title'],
                'type' => $validated['type'],
                'description' => $validated['description'],
                'closing_date' => $validated['closing_date'],]);
    }
    public function  updateJobListing($validated, $id){

        DB::table('joblistings')
            ->where('id', $id)
            ->update([
            'company' => $validated['company'],
            'title' => $validated['title'],
            'type' => $validated['type'],
            'description' => $validated['description'],
            'closing_date' => $validated['closing_date'],]);
    }
    public function deleteListing($id)
    {
        $affectedUser = DB::table('joblistings')
            ->where('id', $id)
            ->delete();
    }
}
