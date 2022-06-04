<?php
use Illuminate\Support\Facades\Auth;
use App\Services\Data\AffinityDao;
use Illuminate\Support\Facades\Redirect;
use App\Models\AffinityMemberListModel;



if (!Auth::check()) { Redirect::to('home')->send();}
$DAO = new \App\Services\Data\AffinityDao();
$affinities = $DAO->getAffinityMember($affinityId);
$group = $DAO->getAffinityReference($affinityId);

?>
@extends('layouts.app')
@section('title', 'Affinity Member List Administration')
@section('content')
<div id = "main">
    <div class="table-responsive card profile " >
        <div  data-bs-toggle="collapse">
            <div class="cardHeader" style="text-align: center">
                <div class="photo-background" style="background-image:url('assets/img/affinity/{{$group->getImage()}}');"></div>
                <h1 style="margin:20px" > {{$group->getName()}} Member Listings</h1>
            </div>
        </div>
        <div class="jumbotron ">
            <div class="card scroll">
                <div class="card-body ">
                        <table id="datatableid " class='table table-striped table-data job-list' border='1'>
                            <thead>
                            <tr>
                                <th style="width: 10%" widthscope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone Number</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($affinities as $affinity) {
                                $member = $DAO->getAffinityMemberListModel($affinity->member_id);
                                ?>
                                <tr >
                                    <td>{{ $member->getMemberFirstName() }}</td>
                                    <td class="name">{{ $member->getMemberLastName()}}</td>
                                    <td class="name">{{ $member->getMemberEmail()}}</td>
                                    <td>{{ $member->getMemberPhone()}}</td>
                                </tr>
                                <?php
                            }?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
