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

@section('content')
    <div id = "main">
        <div class="table-responsive card profile " >
            <div  data-bs-toggle="collapse">
                <div style="margin:20px" class="cardHeader">
                    <h1>Job Listings</h1>
                    <div class="row mb-3">
                        <label  for="search" class="col-md-4 col-form-label text-md-end">Search</label>
                        <div class="col-md-6">
                            <input type="search" placeholder="Search..." class="form-control search-input" data-table="job-list"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="jumbotron ">
                <div class="card scroll">
                    <div class="card-body ">
                        <form action="/jobDetails" method="POST">
                            @csrf
                            <table id="datatableid " class='table table-striped table-data job-list' border='1'>
                                <thead>
                                <tr>
                                    <th scope="col">Company</th>
                                    <th scope="col">Job Title</th>
                                    <th scope="col">Description</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $rows = $JobsDao->getAllJobs();
                                foreach($rows as $row) {
                                $job = new JobModel($row->id, $row->company, $row->title, $row->type, $row->description, $row->closing_date);
                                ?>
                                <tr >
                                    <td class="name">{{ $job->getCompany()}}</td>
                                    <td class="name">{{ $job->getJobTitle()}}</td>
                                    <td style="text-align: justify;">{{$job->getJobDescription()}}</td>
                                    <td><button  class="btn btn-primary formButton" type="submit" name="id"
                                                 value="{{ $job->getJobID()}}">More<br>Details</button></td>
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

@stop
