<?php
namespace App\Services\Data;

use App\Models\AffinityMemberListModel;
use App\Models\AffinityReferenceModel;
use Illuminate\Support\Facades\DB;

class AffinityDao
{
    public function getAllAffinityReference(): \Illuminate\Support\Collection
    {
        return DB::table('affinity_reference')
            ->get();
    }
    public function insertAffinityReference($validated): void
    {
        $image = "default.jpeg";
        DB::table('affinity_reference')->insert([
            'name' => $validated['name'],
            'description' => $validated['description'],
            ]);
    }
    public function updateAffinityReference(AffinityReferenceModel $model): void
    {
        DB::table('affinity_reference')
            ->where('id', $model->getId())
            ->insert([
            'name' => $model->getName(),
            'description' => $model->getDescription(),
        ]);
    }
    public function deleteAffinityGroup($reference): void
    {
        DB::table('affinity_reference')
            ->where('id', '=', $reference)
            ->delete();
    }

    public function getAffinityMemberList(): \Illuminate\Support\Collection
    {
        return DB::table('affinity')
            ->get();
    }

    public function getAffinityMember($reference): \Illuminate\Support\Collection
    {
        return DB::table('affinity')
            ->where('reference_id', '=', $reference)
            ->get();
    }

    public function getAffinityReference($reference): AffinityReferenceModel
    {
        $rows = DB::table('affinity_reference')
            ->where('id', '=', $reference)
            ->get();
        $row = $rows->first();
        return new AffinityReferenceModel($row->id, $row->name, $row->description, $row->image);
    }
    public function insertAffinity($reference, $member): void
    {
        DB::table('affinity')->insert([
            'reference_id' => $reference,
            'member_id' => $member,]);
    }
    public function removeAffinity($reference, $member): void
    {
        DB::table('affinity')
            ->where('reference_id', '=', $reference)
            ->where('member_id', '=', $member)
            ->delete();
    }
    public function getAffinityMemberListModel($member): AffinityMemberListModel
    {
        $UserDao = new UserDao();
        $user = $UserDao->getUser($member);
        $ProfileDao = new ProfileDao();
        $profile = $ProfileDao->getProfile($member);

        return new AffinityMemberListModel( $user->getId(),  $user->getFirstname(), $user->getLastname(), $user->getEmail(),
                                $profile->getPhone());
    }

    public function isAffinityMember($reference, $member): bool
    {
        $temp = DB::table('affinity')
            ->where('reference_id', '=', $reference)
            ->where('member_id', '=', $member)
            ->get();
        if ($temp->count() != 0) {
            return true;
        }
        return false;
    }


}
