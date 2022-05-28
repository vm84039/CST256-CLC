<?php
use Illuminate\Support\Facades\Auth;
use App\Services\Data\UserDao;
use Illuminate\Support\Facades\Redirect;


if (!Auth::check()) { Redirect::to('home')->send();}
$DAO = new UserDao();
$user = $DAO->getUser(Auth::ID());
if ($user->getRoleId() != 2) {
    Auth::logout();
    Redirect::to('home')->send();
}

?>
@extends('layouts.app')
@section('title', 'User Administration')
@section('content')
    <div id = "main">
        <div class="table-responsive card profile " >
            <div class="" data-bs-toggle="collapse">
                <div class="cardHeader">
                    <h1 style="margin:20px" >All Users</h1>
                    <p></p>
                </div>
            </div>
            <div class="jumbotron ">

                <div class="card scroll">
                    <div class="card-body ">
                        <form action="editUser" method="POST">
                            @csrf
                            <table id="datatableid " class='table table-striped table-data user-list' border='1'>
                                <thead>
                                    <tr>
                                        <th scope="col">Username</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Active</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $rows = $DAO->getAllUsers();
                                    foreach($rows as $row) {
                                    ?>
                                    <tr>
                                        <td>{{ $row->username}}</td>
                                        <td class="name">{{ $row->firstname}}</td>
                                        <td class="name">{{ $row->lastname}}</td>
                                        <td>{{ $row->email}}</td>
                                        <td><?php echo $DAO->getRoleByRoleId($row->roleId); ?></td>
                                        <td><?php if ($row->active == 1) {echo "Active";}
                                                    else {echo "Inactive";}
                                            ?>
                                        </td>
                                        @if($row->active == 1)
                                            <td><button  class="btn btn-primary formButton" type="submit" name="id"
                                                         value="{{ $row->id}}">Edit</button></td>
                                            <td><button  class="btn btn-primary formButton" type="submit" name="id"
                                                         value="{{ $row->id}}" formaction="suspend">Suspend</button></td>
                                        @else
                                            <td><button  style="display: none;" class="btn btn-primary formButton" type="submit" name="id"
                                                         value="{{ $row->id}}">Edit</button></td>
                                            <td><button  class="btn btn-primary formButton" type="submit" name="id"
                                                         value="{{ $row->id}}" formaction="activate">Activate</button></td>
                                        @endif
                                        <td><button  class="btn btn-primary formButton" type="submit" name="id"
                                                     value="{{ $row->id}}" formaction="delete">Delete</button></td>
                                    </tr>
                                    <?php
                                    }?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    (function(document) {
        'use strict';
        var TableFilter = (function(myArray) {
            var search_input;
            function _onInputSearch(e) {
                search_input = e.target;
                var tables = document.getElementsByClassName(search_input.getAttribute('data-table'));
                myArray.forEach.call(tables, function(table) {
                    myArray.forEach.call(table.tBodies, function(tbody) {
                        myArray.forEach.call(tbody.rows, function(row) {
                            var text_content = row.textContent.toLowerCase();
                            var search_val = search_input.value.toLowerCase();
                            row.style.display = text_content.indexOf(search_val) > -1 ? '' : 'none';
                        });
                    });
                });
            }
            return {
                init: function() {
                    var inputs = document.getElementsByClassName('search-input');
                    myArray.forEach.call(inputs, function(input) {
                        input.oninput = _onInputSearch;
                    });
                }
            };
        })(Array.prototype);
        document.addEventListener('readystatechange', function() {
            if (document.readyState === 'complete') {
                TableFilter.init();
            }
        });
    })(document);
</script>
