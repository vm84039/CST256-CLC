<?php
use Illuminate\Support\Facades\Auth;
use App\Services\Data\UserDao;
use App\Services\Data\AffinityDao;
use Illuminate\Support\Facades\Redirect;

if (!Auth::check()) { Redirect::to('home')->send();}
$UserDao = new UserDao();
$AffinityDao = new AffinityDao();
$user = $UserDao->getUser(Auth::ID());
$affinities = $AffinityDao->getAllAffinityReference();
?>

@extends('layouts.app')
@section('title', 'Affinity_Groups')
@section('content')

            @if($user->getRoleId() != 2)
                @include('role-user.affinityGroupMember')
            @else
                @include('role-admin.affinityGroupAdmin')
            @endif
@stop
