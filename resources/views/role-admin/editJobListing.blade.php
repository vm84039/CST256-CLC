<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Services\Data\UserDao;

if (!Auth::check()) { Redirect::to('home')->send();}
$UserDAO = new UserDao();
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
            <h1 >ADD NEW JOB LISTING<br><br></h1>
            <form method="POST" action="addJobListing">
                @csrf
                <div class="row" style="margin-bottom: 25px;text-align: left;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3"><label class="form-label" for="company"><strong>Company</strong></label><input class="form-control" type="text" name="company" ></div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3"><label class="form-label" for="title"><strong>Job Title</strong></label><input class="form-control" type="text" name="title"></div>
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
