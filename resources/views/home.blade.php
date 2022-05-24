<?php
use Illuminate\Support\Facades\Auth;
use App\Services\Data\SecurityDao;
use Illuminate\Support\Facades\Redirect;

if (!Auth::check()) { Redirect::to('home')->send();}
$DAO = new SecurityDao();
$user = $DAO->getUser(Auth::ID());
$profile = $DAO->getProfile(Auth::ID());
?>
@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div id = "main">
        <div class="card shadow mb-3 profile">
            <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold"> {{$user->getFirstname()}} {{$user->getLastname()}}  's Profile </p>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <form method="POST" action="memberUpdate">
                    @csrf
                    <input type="hidden" value="-1" name="roleId">
                    <div class="row" style="margin-bottom: 25px;text-align: left;">
                        <div class="col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2" style="display: inline;text-align: center;margin-bottom: 25px;"><img class="rounded-circle mb-3 mt-4 img-fluid" src="{{ asset('assets/img/profile.png') }}" style="display: inline;max-height: 110px;"><br></div>
                        <div class="col-sm-8 col-md-8 col-lg-9 col-xl-10 col-xxl-10 align-self-center">
                            <div class="row">
                                <div class="col-md-12 text-start">
                                    <div class="mb-3"><label class="form-label" for="email"><strong>Email Address</strong></label><input class="form-control" type="email" id="email" value="{{$user->getEmail()}}" readonly></div>
                                </div>
                                <div class="col-md-12 text-start">
                                    <div class="mb-3"><label class="form-label" for="username"><strong>Username</strong></label><input class="form-control" type="text" value="{{$user->getUsername()}}" readonly></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3"><label class="form-label" for="firstname"><strong>First Name</strong></label><input class="form-control" type="text" value="{{$user->getFirstname()}}" name="firstname" required=""></div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3"><label class="form-label" for="lastname"><strong>Last Name</strong></label><input class="form-control" type="text" value="{{$user->getLastname()}}" name="lastname" required=""></div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3"><label class="form-label" for="address"><strong>Address</strong></label><input class="form-control" type="text" value="{{$profile->getAddress()}}" name="address"></div>                            </div>
                        <div class="col-md-6">
                            <div class="mb-3"><label class="form-label" for="state"><strong>State</strong></label>
                                <select class="form-select" name="state">
                                    <option value="AL">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AZ" selected="selected">Arizona</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="DC">District Of Columbia</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="ID">Idaho</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IN">Indiana</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="OH">Ohio</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="OR">Oregon</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="TX">Texas</option>
                                    <option value="UT">Utah</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WA">Washington</option>
                                    <option value="WV">West Virginia</option>
                                    <option value="WI">Wisconsin</option>
                                    <option value="WY">Wyoming</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3"><label class="form-label" for="city"><strong>City</strong></label><input class="form-control" type="text" id="city" value="{{$profile->getCity()}}" name="city" required=""></div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3"><label class="form-label " for="phone"><strong>Mobile Number</strong></label><input class="form-control bfh-phone" data-format="(ddd) ddd-dddd" type="text" value="{{$profile->getPhone()}}" name="phone"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3"><label class="form-label " for="zip"><strong>Zip Code</strong></label><input class="form-control" type="text" value="{{$profile->getZip()}}" name="zip"></div>
                        </div>


                        <div class="col">
                            <p id="emailErrorMsg" class="text-danger" style="display:none;"></p>
                            <p id="passwordErrorMsg" class="text-danger" style="display:none;"></p>
                        </div>
                        <div class="col-md-12" style="text-align: right;margin-top: 5px;"><button class="btn btn-primary btn-sm" id="submitBtn" type="submit">Save Settings</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://geodata.solutions/includes/countrystate.js"></script>
    <script src="{{ asset('js/bootstrap-formhelpers.js') }}"></script>


@endsection
