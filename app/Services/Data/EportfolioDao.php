<?php
namespace App\Services\Data;

use App\Models\EportfolioModel;
use Illuminate\Support\Facades\DB;



class EportfolioDao{
    public function getHistory($id): \Illuminate\Support\Collection
    {
        return DB::table('employment_history')
            ->select('id','start', 'end', 'employer', 'jobtitle', 'description')
            ->where('userid', $id)
            ->orderBy('start', 'desc')
            ->get();
    }
    public function deleteJob($id)
    {
        $affectedUser = DB::table('employment_history')
            ->where('id', $id)
            ->delete();
    }
    public function countHistory($id):int
    {
        return DB::table('employment_history')
            ->where('userid', $id)
            ->count();
    }
    public function insertJob($validated, $id)
    {
        DB::table('employment_history')->insert([
            'start' => $validated['start'],
            'end' => $validated['end'],
            'employer' => $validated['employer'],
            'jobtitle' => $validated['jobTitle'],
            'description' => $validated['description'],
            'userId' => $id, ]);
    }
    public function skillDescription( mixed $skillId):string
    {
        $skips = ["[","]","\""];
        $temp = DB::table('skills_reference')
            ->select('description')
            ->where('skillId', $skillId)
            ->pluck('description');
        return str_replace($skips, ' ', $temp);
    }
    public function getAllSkills(): \Illuminate\Support\Collection
    {
        return DB::table('skills_reference')
            ->select('skillId', 'description')
            ->get();
    }
    public function getUserSkills(mixed $userId): \Illuminate\Support\Collection
    {
        return DB::table('skills')
            ->select('id','skillId')
            -> where ('userId', $userId)
            ->get();
    }
    public function insertUserSkills(mixed $skillId, mixed $userId):void
    {
        DB::table('skills')->insert([
            'userId' => $userId,
            'skillId' => $skillId,
        ]);
    }
    public function deleteSkill($id)
    {
        $affectedUser = DB::table('skills')
            ->where('id', $id)
            ->delete();
    }
    public function getEducation($id): \Illuminate\Support\Collection
    {
        return DB::table('education')
            ->select('id', 'date', 'school', 'type', 'subject')
            ->where('userId', $id)
            ->orderBy('date', 'desc')
            ->get();
    }
    public function countEducation($id):int
    {
        return DB::table('education')
            ->where('userid', $id)
            ->count();
    }
    public function insertEducation($validated, $id): void
    {
        DB::table('education')->insert([
            'date' => $validated['date'],
            'school' => $validated['school'],
            'type' => $validated['type'],
            'subject' => $validated['study'],
            'userId' => $id, ]);
    }
    public function deleteEducation($id)
    {
        $affectedUser = DB::table('education')
            ->where('id', $id)
            ->delete();
    }
    public function getSubject($subject): string
    {
        return match ($subject) {
            1 => "High School Diploma",
            2 => "Bachelor's Degree",
            3 => "Masters's Degree",
        };
    }
}

