<?php
use Illuminate\Support\Facades\Auth;
use App\Services\Data\UserDao;
use App\Services\Data\JobsDao;
use App\Services\Data\ProfileDao;
use App\Services\Data\EportfolioDao;
use Illuminate\Support\Facades\Redirect;
use App\Services\Methods\HelperMethods;

if (!Auth::check()) { Redirect::to('home')->send();}
$UserDao = new UserDao();
$ProfileDao = new ProfileDao();
$user = $UserDao->getUser(Auth::ID());
$profile = $ProfileDao->getProfile(Auth::ID());
$portfolioDao = new EportfolioDao();
$jobs= $portfolioDao->getHistory(Auth::ID());
$userSkills = $portfolioDao->getUserSkills(Auth::ID());
$allSkills = $portfolioDao->getAllSkills();
$schools = $portfolioDao->getEducation(Auth::ID());
$print = new HelperMethods();
$JobsDao = new JobsDao();
$apply = $JobsDao->getJob($jobId);
?>

@extends('layouts.app')
@section('title', 'Job Application')
@section('content')
    <div id = "main">
        <div class="table-responsive card profile " >
            <h2 style="text-align: center;margin: 50px">Thank you.<br><br>You applied for the {{$apply->getJobTitle()}} position at
                {{$apply->getCompany()}}.<br><br>Good Luck!!!</h2>
            <a style="margin-left: 100px" href="jobListings">Back to Job Listings</a>
        </div>
    </div>
@stop
