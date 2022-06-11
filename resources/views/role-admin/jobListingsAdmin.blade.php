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
            <div class="cardHeader">
                <h1 style="margin:20px" >Job Listings</h1>
            </div>
        </div>
        <div class="jumbotron ">
            <a class="btn btn-link" href="addJobListing">
                {{'Add New Job Listing'}}
            </a>
            <div class="card scroll">
                <div class="card-body ">
                    <table id="datatableid " class='table table-striped table-data job-list' border='1'>
                        <thead>
                        <tr>
                            <th style="width: 10%" widthscope="col">Closing Date</th>
                            <th scope="col">Job Title</th>
                            <th scope="col">Company</th>
                            <th scope="col">FT/PT</th>
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
                            <td>{{ $method->printDate($job->getClosingDate()) }}</td>
                            <td class="name">{{ $job->getJobTitle()}}</td>
                            <td class="name">{{ $job->getCompany()}}</td>
                            <td>{{ $job->getJobTypeDesciption()}}</td>
                            <td style="text-align: justify;">{{$job->getJobDescription()}}</td>
                            <td><button  class="btn btn-primary formButton" type="submit" name="id"
                                         value="{{ $job->getJobID()}}">Edit</button></td>
                            <td><button  class="btn btn-primary formButton" type="submit" name="id"
                                         value="{{ $job->getJobID() }}" formaction="deleteListing">Delete</button></td>
                        </tr>
                        <?php
                        }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
