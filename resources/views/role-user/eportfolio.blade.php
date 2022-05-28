<?php
use Illuminate\Support\Facades\Auth;
use App\Services\Data\UserDao;
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


?>
@extends('layouts.app')
@section('title', 'E-Portfolio')
@section('content')
<div id = "main">
    <div class="card shadow mb-3 profile">
        <div class="card-header py-3">
            <h1>{{$user->getFirstname()}} {{$user->getFirstname()}}'s E-Portfolio Page  </h1>
        </div>
        <div class="card scroll">
            <div class="eportBanner ">
                <button type="button" class="collapsible cardHeader">Personal Information</button>
                <div class="content">
                    <table class="table table-hover table-bordered mt32 book-list" style="z-index: -100">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{$user->getFirstname()}} {{$user->getFirstname()}}</td>
                            <td>{{$profile->displayPhone()}}</td>
                            <td>{{$user->getEmail()}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div> <!--Personal Information-->
            <div class="eportBanner"><!--Job History-->
                <button type="button" class="collapsible cardHeader">Job History</button>
                <div class="content">
                    @if($portfolioDao->countHistory(Auth::id())<3)
                        <a class="btn btn-link" href="addJob">
                            {{'Add New Job'}}
                        </a>
                    @endif
                    @if($portfolioDao->countHistory(Auth::id()) > 0)
                        @foreach($jobs as $job)
                            <form action="deleteJob" method="POST">
                                    @csrf
                                <input type="hidden" name="jobId" value="$job->id">
                                <table class="table table-hover table-bordered mt32 book-list" style="z-index: -100">
                                    <thead>
                                    <tr>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{$print->printDate($job->start)}}</td>
                                        <td>{{$print->printDate($job->end)}}</td>
                                    </tr>
                                    <tr>
                                        <th>Employer</th>
                                        <th>Job Title</th>
                                    </tr>
                                    <tr>
                                        <td>{{$job->employer}}</td>
                                        <td>{{$job->jobtitle}}</td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Job Description</th>
                                    </tr>
                                    <tr>
                                        <td colspan="2">{{$job->description}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <button class="btn btn-link" type ="submit" name="id" value="{{ $job->id }}">
                                                {{'Delete Job'}}
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </form>
                        @endforeach
                    @endif
                </div>
            </div><!--Job History-->
            <div class="eportBanner"><!--Skills-->
            <button type="button" class="collapsible cardHeader">Skills</button>
                <div class="content">
                    <p>You may add up to five job skills</p>
                    @if($userSkills->count() != 0)<!--Display Current Skills-->
                    <form method="POST" action="addSkills">
                        @csrf
                        <table class="table table-hover table-bordered mt32 book-list" style="z-index: -100">
                            <thead>
                            <tr>
                                <th colspan="5">Skills</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    foreach($userSkills as $skill) {?>
                                        <td style="width: 20%">{!! $portfolioDao->skillDescription($skill->skillId)!!} </td> <?php
                                    } $num = 5 - $userSkills->count()?>
                                     <td colspan="{{$num}}"> </td>
                                </tr>
                                <tr>
                                    <?php
                                    foreach($userSkills as $skill) {?>
                                    <td style="width: 20%; ">
                                        <button style="padding: 0;margin: 0" class="btn btn-link" formaction="deleteSkill" type ="submit" name="id" value="{{ $skill->id }}">
                                            {{'Delete'}}
                                        </button>
                                    </td> <?php
                                    } $num = 5 - $userSkills->count()?>
                                    <td colspan="{{$num}}"> </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                    @endif
                    @if($userSkills->count() < 5)
                        <button class="btn btn-primary collapsible" style="width:120px; padding:10px; font-weight: bolder" type="button">Add Skills</button>
                        <div class="content">
                            <form method="POST" action="addSkills">
                                @csrf
                                @foreach ($allSkills as $askill)
                                    <div class="form-check form-check-inline" style="margin-top: 15px">
                                        <input style="color: darkblue;" class="form-check-input" type="radio" name="skillID" value="{{$askill->skillId}}">
                                        <label class="form-check-label" style="color: darkblue; padding-right: 15px; "for="{{$askill->skillId}}">{{$askill->description}}</label>
                                    </div>
                                @endforeach
                                <div class="col-md-12" style="text-align: right;margin-top: 5px;"><button style="margin: 20px; float: left" class="btn btn-primary btn" id="submitBtn" type="submit">Save</button></div>
                            </form>
                        </div>
                    @endif
                </div>
            </div><!--Skills-->
            <div class="eportBanner"><!--Education-->
                <button type="button" class="collapsible cardHeader">Education</button>
                <div class="content">
                    @if($portfolioDao->countEducation(Auth::id())<=3)
                        <a class="btn btn-link" href="addEducation">
                            {{'Add Degree or Diploma'}}
                        </a>
                    @endif
                    @if($portfolioDao->countEducation(Auth::id()) > 0)
                        @foreach($schools as $school)
                    <form method="POST" action="deleteEducation">
                                    @csrf
                            <table class="table table-hover table-bordered mt32 book-list" style="z-index: -100">
                                <thead>
                                <tr>
                                    <th>Graduation Date</th>
                                    <th>School</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{$print->printDate($school->date)}}</td>
                                    <td>{{$school->school}}</td>
                                </tr>
                                <tr>
                                    <th>Type</th>
                                    <th>Subject</th>
                                </tr>
                                <tr>
                                    <td>{{$portfolioDao->getSubject($school->type)}}</td>
                                    <td>{{$school->subject}}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <button class="btn btn-link" type ="submit" name="id" value="{{ $school->id }}">
                                            {{'Delete'}}
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                    </form>
                        @endforeach
                    @endif
                </div>
            </div><!--Education-->
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

