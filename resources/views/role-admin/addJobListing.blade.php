<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Services\Data\UserDao;
use App\Services\Data\JobsDao;
use App\Models\JobModel;

if (!Auth::check()) { Redirect::to('home')->send();}
$UserDAO = new UserDao();
$JobsDao = new JobsDao();
$admin = $UserDAO->getUser(Auth::ID());
if ($admin->getRoleId() != 2) {
    Auth::logout();
    Redirect::to('home')->send();}

    ?>

@extends('layouts.app')
@section('title', 'E-Portfolio')
@section('content')
    <div id = "main">
        <div class="card-body card shadow mb-3 profile">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if($route == "add")
                    <h1 >ADD NEW JOB LISTING<br><br></h1>
                <?php $job = new JobModel(0, " ", " ", 1, " ", \Carbon\Carbon::now()); ?>
                @else
                    <h1 >EDIT JOB LISTING<br><br></h1>
                    <?php $job = $JobsDao->getJob($id);     ?>
                @endif
            <form method="POST" action="addJobListing">
                @csrf
                <input type="hidden"  name="route" value="{{$route}}">
                <input type="hidden"  name="jobId" value="{{$job->getJobID()}}">
                <div class="row" style="margin-bottom: 25px;text-align: left;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3"><label class="form-label" for="company"><strong>Company</strong></label><input class="form-control" type="text" name="company" value="{{$job->getCompany()}}"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3"><label class="form-label" for="title"><strong>Job Title</strong></label><input class="form-control" type="text" name="title" value="{{$job->getJobTitle()}}"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3"><label class="form-label" for="type"><strong>FT/PT</strong></label>
                                <select class="form-select" name="type">
                                    <option value="1">Full-time</option>
                                    <option value="2">Part-time</option>
                                </select>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3"><label class="form-label" for="closing_date"><strong>Closing Date</strong></label><input class="form-control" type="date" name="closing_date"></div>
                    </div>
                    </div>
                </div>
                <div class="col-md-12" >
                        <div  class="mb-3"><label class="form-label" for="description"><strong>Job Description</strong></label></div>
                        <textarea name="description" cols="125" rows="8" value="{{$job->getJobDescription()}}"></textarea>
                </div>
                <div class="col-md-12" style="text-align: right;margin-top: 5px;"><button style="margin: 20px; float: left" class="btn btn-primary btn-lg" id="submitBtn" type="submit">Save</button></div>
                <div class="col-md-12" style="text-align: right;margin-top: 5px;"><a style="margin: 20px; " class="btn btn-primary btn-lg" id="submitBtn" href="jobListings" type="button">Cancel</a></div>
            </form>
        </div>
    </div>
    <script src="https://geodata.solutions/includes/countrystate.js"></script>
    <script src="{{ asset('js/bootstrap-formhelpers.js') }}"></script>


    </div>
@stop
