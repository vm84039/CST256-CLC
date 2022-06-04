<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Services\Data\UserDao;
use App\Services\Data\AffinityDao;
use App\Models\AffinityReferenceModel;

if (!Auth::check()) { Redirect::to('home')->send();}
$UserDAO = new UserDao();
$AffinityDao = new AffinityDao();
$admin = $UserDAO->getUser(Auth::ID());
$affinityReference = new AffinityReferenceModel(-1, "Affinity Group Name", "Affinity Group Description", "default.jpeg"); $id = -1;

if ($admin->getRoleId() != 2) {
    Auth::logout();
    Redirect::to('home')->send();}
?>

@extends('layouts.app')
@section('title', 'Add Affinity Group')
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
        <h1 >ADD NEW AFFINITY GROUP<br><br></h1>
        <form method="POST" action="saveAffinityGroup">
            @csrf
            <input type="hidden"  name="route" value="{{$route}}">
            <input type="hidden"  name="reference" value="{{$id}}">
            <div class="row" style="margin-bottom: 25px;text-align: left;">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3"><label class="form-label" for="name"><strong>Affinity Name</strong></label><input class="form-control" type="text" name="name" value="{{$affinityReference->getName()}} " ></div>
                    </div>
                </div>
            </div>
                <div><label class="form-label" for="description"><strong>Description</strong></label><input class="form-control" type="text" name="description" value="{{$affinityReference->getDescription()}} "></div>

            <div class="col-md-12" style="text-align: right;margin-top: 5px;"><button style="margin: 20px; float: left" class="btn btn-primary btn-lg" id="submitBtn" type="submit">Save</button></div>
            <div class="col-md-12" style="text-align: right;margin-top: 5px;"><a style="margin: 20px; " class="btn btn-primary btn-lg" id="submitBtn" href="affinity" type="button">Cancel</a></div>
        </form>
    </div>
</div>


</div>
@stop
