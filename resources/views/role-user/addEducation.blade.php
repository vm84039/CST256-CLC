<?php
use Illuminate\Support\Facades\Auth;
use App\Services\Data\UserDao;
use App\Services\Data\ProfileDao;
use App\Services\Data\AffinityDao;
use Illuminate\Support\Facades\Redirect;

if (!Auth::check()) { Redirect::to('home')->send();}
$UserDao = new UserDao();
$ProfileDao = new ProfileDao();
$user = $UserDao->getUser(Auth::ID());
$profile = $ProfileDao->getProfile(Auth::ID());
$schoolDao = new AffinityDao();
$schools = $schoolDao->getHistory(Auth::ID());


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
            <h1 >ADD EDUCATION<br><br></h1>
                <form method="POST" action="addEducation">
                    @csrf
                    <div class="row" style="margin-bottom: 25px;text-align: left;">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3"><label class="form-label" for="date"><strong>Graduation Date</strong></label><input class="form-control" type="date" name="date" ></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3"><label class="form-label" for="school"><strong>School Name</strong></label><input class="form-control" type="text" name="school"></div>
                                </div>
                            </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="mb-3"><label class="form-label" for="type"><strong>Type of Degree</strong></label>
                                    <select class="form-select" name="type">
                                        <option value=1>High School Diploma</option>
                                        <option value=2>Bachelor's Degree</option>
                                        <option value=3>Master's Degree</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3"><label class="form-label" for="study"><strong>Course of Study</strong></label><input class="form-control" type="text" name="study" ></div>
                        </div>
                    </div>
                    <div class="col-md-12" style="text-align: right;margin-top: 5px;"><button style="margin: 20px; float: left" class="btn btn-primary btn-lg" id="submitBtn" type="submit">Add Degree</button></div>
                </form>
        </div>
    </div>
    <script src="https://geodata.solutions/includes/countrystate.js"></script>
    <script src="{{ asset('js/bootstrap-formhelpers.js') }}"></script>


    </div>
@stop
