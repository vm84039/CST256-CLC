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
            @include('role-user.portfolio-partial')
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

