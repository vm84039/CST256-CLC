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

?>
@extends('layouts.app')
@section('title', 'Jobs Listings')
@section('content')
    @if($user->getRoleId() != 2)
        @include('role-user.jobListingsMember')
    @else
        @include('role-admin.jobListingsAdmin')
    @endif
@endsection
