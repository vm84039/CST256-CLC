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
$affinityReference = $AffinityDao->getAffinityReference($id);

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

        <h1 >EDIT AFFINITY GROUP<br><br></h1>
        <form method="POST" action="saveAffinityGroup">
            @csrf
            <input type="hidden"  name="id" value="{{$id}}">
            <div class="row" style="margin-bottom: 25px;text-align: left;">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            @if($edit == "name")
                                <label class="form-label" for="name"><strong>Affinity Name</strong></label><input class="form-control" type="text" name="name" value="{{$affinityReference->getName()}}">
                                        <button style="margin: 20px; float: left" class="btn btn-primary btn-sm" id="submitBtn" type="submit">Save</button>
                                        <button style="margin: 20px; float: left" class="btn btn-primary btn-sm" formaction="cancelEditAffinity" id="submitBtn" type="submit">Cancel</button>

                            @else
                                <label class="form-label" for="name"><strong>Affinity Name</strong></label><input class="form-control" type="text" name="name" value="{{$affinityReference->getName()}}" readonly>
                                    <button class="btn btn-link" name="edit" value="name" formaction="editAffinityGroup">
                                    {{'Edit'}}
                                </button>
                           @endif
                        </div>
                    </div>
                </div>
                <div>
                    @if($edit == "description")
                        <div class="form-group">
                            <label class="form-label" for="description"><strong>Description</strong></label>
                            <textarea class="form-control" type="text" name="description" value="{{$affinityReference->getDescription()}} ">{{$affinityReference->getDescription()}} </textarea>
                            <button style="margin: 20px; float: left" class="btn btn-primary btn-sm" id="submitBtn" type="submit">Save</button>
                            <button style="margin: 20px; float: left" class="btn btn-primary btn-sm" formaction="cancelEditAffinity" id="submitBtn" type="submit">Cancel</button>
                        </div>
                    @else
                            <div class="form-group">
                                <label class="form-label" for="description"><strong>Description</strong></label>
                                <textarea class="form-control" type="text" name="description" value="{{$affinityReference->getDescription()}} "readonly>{{$affinityReference->getDescription()}} </textarea>
                                <button class="btn btn-link" name="edit" value="description" formaction="editAffinityGroup">
                                    {{'Edit'}}
                                </button>
                            </div>
                    @endif
                </div>
                <div class="col-md-6">
                    <div class="md-3">
                        @if($edit == "image")
                            <label class="form-label" for="image"><strong>Image File</strong></label><input class="form-control" type="text" name="image" value="{{$affinityReference->getImage()}}">
                            <button style="margin: 20px; float: left" class="btn btn-primary btn-sm" id="submitBtn" type="submit">Save</button>
                            <button style="margin: 20px; float: left" class="btn btn-primary btn-sm" formaction="cancelEditAffinity" id="submitBtn" type="submit">Cancel</button>
                        @else
                            <label class="form-label" for="image"><strong>Image File</strong></label><input class="form-control" type="text" name="image" value="{{$affinityReference->getImage()}}" readonly>
                            <button class="btn btn-link" name="edit" value="image" formaction="editAffinityGroup">
                                {{'Edit'}}
                            </button>
                        @endif
                    </div>

                </div>
                </div>
                <div class="photo-background" style="min-height: 250px; background-repeat:no-repeat; background-size:contain; margin-:25px;background-image:url('assets/img/affinity/{{$affinityReference->getImage()}}');" readonly></div>
            <div class="col-md-12" style="text-align: right;margin-top: 5px;"><button style="margin: 20px; float: left" class="btn btn-primary btn-lg" id="submitBtn" type="submit">Save</button></div>
            <div class="col-md-12" style="text-align: right;margin-top: 5px;"><a style="margin: 20px; " class="btn btn-primary btn-lg" id="submitBtn" href="affinity" type="button">Cancel</a></div>
        </form>
    </div>
</div>
<script src="https://geodata.solutions/includes/countrystate.js"></script>
<script src="{{ asset('js/bootstrap-formhelpers.js') }}"></script>


</div>
@stop
