<?php
use Illuminate\Support\Facades\Auth;
use App\Services\Data\UserDao;
use App\Services\Data\ProfileDao;
use App\Services\Data\EportfolioDao;
use Illuminate\Support\Facades\Redirect;

if (!Auth::check()) { Redirect::to('home')->send();}
$UserDao = new UserDao();
$ProfileDao = new ProfileDao();
$user = $UserDao->getUser(Auth::ID());
$profile = $ProfileDao->getProfile(Auth::ID());
$jobDao = new EportfolioDao();
$jobs = $jobDao->getHistory(Auth::ID());


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
            <h1 >ADD EMPLOYMENT HISTORY<br><br></h1>
                <form method="POST" action="addJob">
                    @csrf
                    <div class="row" style="margin-bottom: 25px;text-align: left;">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3"><label class="form-label" for="start"><strong>Job Start Date</strong></label><input class="form-control" type="date" name="start" ></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3"><label class="form-label" for="end"><strong>Job End Date</strong></label><input class="form-control" type="date" name="end"></div>
                                </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3"><label class="form-label" for="employer"><strong>Employer</strong></label><input class="form-control" type="text" name="employer" ></div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3"><label class="form-label" for="jobTitle"><strong>Job Title</strong></label><input class="form-control" type="text" name="jobTitle"></div>
                        </div>
                    </div>
                    <div class="col-md-12" >
                        <div  class="mb-3"><label class="form-label" for="description"><strong>Job Description></strong></label></div>
                        <textarea name="description" cols="125" rows="8"></textarea>
                    </div>
                    <div class="col-md-12" style="text-align: right;margin-top: 5px;"><button style="margin: 20px; float: left" class="btn btn-primary btn-lg" id="submitBtn" type="submit">Add Job</button></div>
                </form>
        </div>
    </div>
    <script src="https://geodata.solutions/includes/countrystate.js"></script>
    <script src="{{ asset('js/bootstrap-formhelpers.js') }}"></script>


    </div>
@stop
