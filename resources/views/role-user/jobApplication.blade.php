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
        <div  class="card shadow mb-3 profile">
            <div class="card-header py-3">
                <div class="card scroll">
                    <h1 style="margin: 20px" >Job Application  </h1>
                    <div class="eportBanner ">
                        <button type="button" class="collapsible cardHeader">Position Applying For</button>
                        <div class="content" style="display: block">
                                <table class="table table-hover table-bordered mt32 book-list" style="z-index: -100">
                                    <thead>
                                    <tr>
                                        <th>Listing ID</th>
                                        <th colspan="2">Company</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{$apply->getJobID()}}</td>
                                        <td>{{$apply->getCompany()}}</td>
                                    </tr>
                                    <tr>
                                        <th>Job Type</th>
                                        <th>Job Title</th>
                                        <th>Closing Date</th>
                                    </tr>
                                    <tr>
                                        <td>{{$apply->getJobType()}}</td>
                                        <td>{{$apply->getJobTitle()}}</td>
                                        <td>{{$print->printDate($apply->getClosingDate())}}</td>
                                    </tr>
                                    <tr>
                                        <th colspan="3">Job Description</th>
                                    </tr>
                                    <tr>
                                        <td colspan="3">{{$apply->getJobDescription()}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <button class="btn btn-link" type ="submit" name="id" value="{{ $apply->getJobID() }}">
                                                {{'Cancel'}}
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                        </div>
                </div> <!--Position Applying For-->
                    @include('role-user.portfolio-partial')
                    <div>
                        <form action="apply" method="POST">
                            @csrf
                            <input type="hidden" name="jobId" value="$jobId">
                            <button style="margin: 50px"  class="btn-lg btn-primary formButton" type="submit" name="id"
                                     value="{{ $jobId}}">APPLY</button>
                            <button style="margin: 50px"  class="btn-lg btn-primary formButton" type="submit" name="id"
                                value="{{ $jobId}}">CANCEL</button>
                        </form>
                    </div>
                </div>
        </div>
        </div>
    </div>
    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        }
    </script>
@endsection
