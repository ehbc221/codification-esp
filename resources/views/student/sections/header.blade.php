<header class="topnavbar-wrapper">
    <!-- START Top Navbar-->
    <nav role="navigation" class="navbar topnavbar">
        <!-- START navbar header-->
        <div class="navbar-header">
            <button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#/" class="navbar-brand">
                <div class="brand-logo">
                    <img src="{{ asset('img/codification-esp.png') }}" alt="App Logo" class="img-responsive">
                </div>
                <div class="brand-logo-collapsed">
                    <img src="{{ asset('img/codification-esp-small.png') }}" alt="App Logo" class="img-responsive">
                </div>
            </a>
        </div>
        <!-- END navbar header-->
        <!-- START Nav wrapper-->
        <div class="navbar-collapse collapse">
            <!-- START Left navbar-->
            <ul class="nav navbar-nav">
                <li>
                    <a href="#" data-toggle="dropdown"><i class="fa fa-credit-card"></i> Profil</a>
                    <ul class="dropdown-menu animated fadeIn">
                        <li><a href="{{ route('student.profil.show', ['id' => Auth::user()->id]) }}"><i class="fa fa-user"></i> Mon Compte</a></li>
                        <li>
                            <a href="{{ route('logout') }}" style="color: red;" id="logout"><span class="text-danger"><i class="fa fa-sign-out"></i> Déconnexion</span></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
                <li><a href="{{ route('student.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{ route('student.codifications.index') }}"><i class="fa fa-check-circle"></i> Codifications</a></li>
                <li><a href="{{ route('student.reservations.index') }}"><i class="fa fa-clock-o"></i> Réservations</a></li>
                <li><a href="{{ route('student.echanges.index') }}"><i class="fa fa-exchange"></i> Échanges</a></li>
            </ul>
            <!-- END Left navbar-->
            <!-- START Right Navbar-->
            <ul class="nav navbar-nav navbar-right">
                <!-- Search icon-->
                <!-- START lock screen-->
                <li class="dropdown">
                    <a href="lock.html" title="Lock screen">
                        <em class="icon-lock"></em>
                    </a>
                </li>
                <!-- END lock screen-->
                <!-- Search icon-->
                <li>
                    <a href="#" data-search-open="">
                        <em class="icon-magnifier"></em>
                    </a>
                </li>
                <!-- START Alert menu-->
                <li class="dropdown dropdown-list">
                    <a href="#" data-toggle="dropdown">
                        <em class="icon-bell"></em>
                        <div class="label label-danger">11</div>
                    </a>
                    <!-- START Dropdown menu-->
                    <ul class="dropdown-menu animated flipInX">
                        <li>
                            <!-- START list group-->
                            <div class="list-group">
                                <!-- list item-->
                                <a href="#" class="list-group-item">
                                    <div class="media-box">
                                        <div class="pull-left">
                                            <em class="fa fa-twitter fa-2x text-info"></em>
                                        </div>
                                        <div class="media-box-body clearfix">
                                            <p class="m0">New followers</p>
                                            <p class="m0 text-muted">
                                                <small>1 new follower</small>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <!-- list item-->
                                <a href="#" class="list-group-item">
                                    <div class="media-box">
                                        <div class="pull-left">
                                            <em class="fa fa-envelope fa-2x text-warning"></em>
                                        </div>
                                        <div class="media-box-body clearfix">
                                            <p class="m0">New e-mails</p>
                                            <p class="m0 text-muted">
                                                <small>You have 10 new emails</small>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <!-- list item-->
                                <a href="#" class="list-group-item">
                                    <div class="media-box">
                                        <div class="pull-left">
                                            <em class="fa fa-tasks fa-2x text-success"></em>
                                        </div>
                                        <div class="media-box-body clearfix">
                                            <p class="m0">Pending Tasks</p>
                                            <p class="m0 text-muted">
                                                <small>11 pending task</small>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <!-- last list item -->
                                <a href="#" class="list-group-item">
                                    <small>More notifications</small>
                                    <span class="label label-danger pull-right">14</span>
                                </a>
                            </div>
                            <!-- END list group-->
                        </li>
                    </ul>
                    <!-- END Dropdown menu-->
                </li>
                <!-- Fullscreen (only desktops)-->
                <li class="visible-lg">
                    <a href="#" data-toggle-fullscreen="">
                        <em class="fa fa-expand"></em>
                    </a>
                </li>
                <!-- END Alert menu-->
                <!-- END Contacts menu-->
            </ul>
            <!-- END Right Navbar-->
        </div>
        <!-- END Nav wrapper-->
        <!-- START Search form-->
        <form role="search" action="search.html" class="navbar-form">
            <div class="form-group has-feedback">
                <input type="text" placeholder="Type and hit enter ..." class="form-control">
                <div data-search-dismiss="" class="fa fa-times form-control-feedback"></div>
            </div>
            <button type="submit" class="hidden btn btn-default">Submit</button>
        </form>
        <!-- END Search form-->
    </nav>
    <!-- END Top Navbar-->
</header>

@push('scripts')
    <script type="text/javascript">
        /*
            LOGOUT PROMPT
        */
        var logout_link = $('#logout')[0], logout_form = $('#logout-form')[0];
        handleLogoutForm(logout_form, logout_link);
    </script>
@endpush