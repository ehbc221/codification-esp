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
                        <li><a href="{{ route('lock.get') }}"><i class="fa fa-lock"></i> Vérouiller</a></li>
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
        </div>
        <!-- END Nav wrapper-->
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