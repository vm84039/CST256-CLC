<?php
use App\Services\Data\UserDao;
use Illuminate\Support\Facades\Auth;
    $UserDao = new UserDao();
    if (Auth::check()) {
        $user = $UserDao->getUser(AUTH::id());
    }
?>

@if (Auth::check())
    {{--        **********************Member Sidebar***************************--}}
    @if ($user->getRoleId() == '1')

        <div id="sidebar">
            <nav>
                <div class="sidebar-header">
                    <h3>Member Profile</h3>
                </div>

                <ul class="list-unstyled components">
                    <li class="active">
                        <a href="home">
                            <i class="glyphicon glyphicon-home"></i>
                            Profile
                        </a>
                    </li>
                    <li>
                        <a href="eportfolio">
                            <i class="glyphicon glyphicon-briefcase"></i>
                            E-Portfolio
                        </a>
                    </li>
                    <li>
                        <a href="affinity">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            Affinity Groups
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
{{--        ****************************************************************--}}
    @endif
    {{--        **********************Admin Sidebar***************************--}}
    @if ($user->getRoleId() == '2')
        <div id="sidebar">
            <nav>
                <div class="sidebar-header">
                    <h3>Administration Profile</h3>
                </div>

                <ul class="list-unstyled components">
                    <li>
                        <a href="home">
                            <i class="glyphicon glyphicon-home"></i>
                            Profile
                        </a>
                    </li>
                    <li>
                        <a href="allUsers">
                            <i class="glyphicon glyphicon-briefcase"></i>
                            Role Administration
                        </a>
                    </li>
                    <li>
                        <a href="jobListings">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            Job Listings
                        </a>
                    </li>
                    <li>
                        <a href="affinity">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            Affinity Groups
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    @endif
@endif
<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<!-- Bootstrap Js CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
<script src="https://geodata.solutions/includes/countrystate.js"></script>
@
