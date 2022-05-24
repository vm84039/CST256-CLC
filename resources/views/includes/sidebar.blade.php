<?php
use App\Services\Data\SecurityDao;
use Illuminate\Support\Facades\Auth;
    $DAO = new SecurityDao();
    if (Auth::check()) {
        $user = $DAO->getUser(AUTH::id());
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
                        <a href="home" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-home"></i>
                            Profile
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-briefcase"></i>
                            Coming Soon
                        </a>
                        <a href="#" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            Coming Soon
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-link"></i>
                            Coming Soon
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-paperclip"></i>
                            Coming Soon
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
                        <a href="suspend">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            Suspend Account
                        </a>
                    </li>
                    <li>
                        <a href="delete">
                            <i class="glyphicon glyphicon-link"></i>
                            Delete Account
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
