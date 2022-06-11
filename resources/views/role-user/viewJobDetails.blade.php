<?php
use Illuminate\Support\Facades\Auth;
use App\Services\Data\UserDao;
use App\Services\Data\JobsDao;
use Illuminate\Support\Facades\Redirect;
use App\Models\JobModel;
use App\Services\Methods\HelperMethods;

if (!Auth::check()) { Redirect::to('home')->send();}
$DAO = new UserDao();
$JobsDao = new JobsDao();
$user = $DAO->getUser(Auth::ID());
$method = new HelperMethods();
$job = $JobsDao->getJob($id)

?>
@extends('layouts.app')
@section('title', 'Jobs Details')
@section('content')
    <div id = "main">
        <div class="table-responsive card profile " >
            <form method="POST" action="jobApp">
                @csrf
                <div class="grid-container">
                    <div class="item-Title item item-Header">Company</div>
                    <div class="item-Title item ">{{$job->getCompany()}}</div>
                    <div class="item item-Header">Listing ID</div>
                    <div class="item-JobTitle item item-Header">Job Title</div>
                    <div class="item">{{$job->getJobID()}}</div>
                    <div class="item-JobTitle item">{{$job->getJobTitle()}}</div>
                    <div class="item item-Header">Job Type</div>
                    <div class="item item-Header">Closing Date</div>
                    <div class="item-Apply item">
                        <button  style="width:300px;height: 150px;font-size: xx-large;font-weight: bolder" class="btn-lg btn-primary formButton" type="submit" name="id"
                                                          value="{{ $job->getJobID()}}">APPLY</button>
                    </div>
                    <div class="item">{{$job->getJobTypeDesciption()}}</div>
                    <div class="item">{{$method->printDate($job->getClosingDate())}}</div>
                    <div class= "item-Header item-Title item">Job Description</div>
                    <div style="text-align: justify; padding: 20px" class="item-JobDescription item">{{$job->getJobDescription()}}</div>
                </div>
            </form>
        </div>
    </div>

@endsection
