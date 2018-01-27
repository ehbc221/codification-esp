<aside class="aside">
    <!-- START Sidebar (left)-->
    <div class="aside-inner">
        <nav data-sidebar-anyclick-close="" class="sidebar">
            <!-- START sidebar nav-->
            <ul class="nav">
                <!-- START user info-->
                <li class="has-user-block">
                    <div id="user-block" class="collapse">
                        <div class="item user-block">
                            <!-- User picture-->
                            <div class="user-block-picture">
                                <div class="user-block-status">
                                    <img src="{{ asset('angle/app/img/user/user.jpg') }}" alt="Avatar" width="60" height="60" class="img-thumbnail img-circle">
                                    <div class="circle circle-success circle-lg"></div>
                                </div>
                            </div>
                            <!-- Name and Job-->
                            <div class="user-block-info">
                                <span class="user-block-name">{{ auth()->user()->name }}</span>
                                <span class="user-block-role">{{ auth()->user()->role->display_name }}</span>
                                <span class="text text-danger">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();"
                                                                    style="color: red;">
                                        <i class="fa fa-sign-out"></i> Déconnexion
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </span>
                            </div>
                        </div>
                    </div>
                </li>
                <!-- END user info-->
                <!-- Iterates over all sidebar items-->
                <li class="nav-heading ">
                    <span data-localize="sidebar.heading.HEADER">Main Navigation</span>
                </li>
                <li class=" ">
                    <a href="{{ route('admin.dashboard') }}" title="Dashboard">
                        <em class="icon-speedometer"></em>
                        <span data-localize="sidebar.nav.DASHBOARD">Dashboard</span>
                    </a>
                </li>
                <li class="nav-heading ">
                    <span data-localize="sidebar.heading.USERS">Utilisateurs</span>
                </li>
                <li class=" ">
                    <a href="{{ route('admin.utilisateurs.index') }}" title="Comptes">
                        <em class="fa fa-globe"></em>
                        <span data-localize="sidebar.nav.ACCOUNTS">Comptes</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="{{ route('admin.admins.index') }}" title="Admins">
                        <em class="fa fa-lock"></em>
                        <span data-localize="sidebar.nav.ADMINS">Admins</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="{{ route('admin.etudiants.index') }}" title="Étudiants">
                        <em class="fa fa-book"></em>
                        <span data-localize="sidebar.nav.STUDENTS">Étudiants</span>
                    </a>
                </li>
                <li class="nav-heading ">
                    <span data-localize="sidebar.heading.SCHOOLS">École</span>
                </li>
                <li class=" ">
                    <a href="{{ route('admin.departements.index') }}" title="Départements">
                        <em class="fa fa-archive"></em>
                        <span data-localize="sidebar.nav.DEPARTMENTS">Départements</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="{{ route('admin.formations.index') }}" title="">
                        <em class="icon-graduation"></em>
                        <span data-localize="sidebar.nav.FORMATIONS">Formations</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="{{ route('admin.niveaux.index') }}" title="Niveaux">
                        <em class="fa fa-level-up"></em>
                        <span data-localize="sidebar.nav.GRADES">Niveaux</span>
                    </a>
                </li>
                <li class="nav-heading ">
                    <span data-localize="sidebar.heading.LODGEMENTS">Logements</span>
                </li>
                <li class=" ">
                    <a href="{{ route('admin.batiments.index') }}" title="Batiments">
                        <em class="fa fa-home"></em>
                        <span data-localize="sidebar.nav.BLOCKS">Batiments</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="{{ route('admin.etages.index') }}" title="Étages">
                        <em class="fa fa-sort-numeric-desc"></em>
                        <span data-localize="sidebar.nav.FLOORS">Étages</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="{{ route('admin.couloirs.index') }}" title="Couloirs">
                        <em class="fa fa-arrows-h"></em>
                        <span data-localize="sidebar.nav.LANES">Couloirs</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="{{ route('admin.chambres.index') }}" title="Chambres">
                        <em class="fa fa-key"></em>
                        <span data-localize="sidebar.nav.ROOMS">Chambres</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="{{ route('admin.positions.index') }}" title="Positions">
                        <em class="fa fa-map-marker"></em>
                        <span data-localize="sidebar.nav.POSITIONS">Positions</span>
                    </a>
                </li>
                <li class="nav-heading ">
                    <span data-localize="sidebar.heading.CODIFICATIONS">Codifications</span>
                </li>
                <li class=" ">
                    <a href="{{ route('admin.periodes-codifications.index') }}" title="Codification">
                        <em class="fa fa-calendar"></em>
                        <span data-localize="sidebar.nav.DOCUMENTATION">Périodes Codification</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="{{ route('admin.codifications.index') }}" title="Codifications">
                        <em class="fa fa-check-circle"></em>
                        <span data-localize="sidebar.nav.DOCUMENTATION">Codifications</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="{{ route('admin.reservations.index') }}" title="Réservations">
                        <em class="fa fa-clock-o"></em>
                        <span data-localize="sidebar.nav.DOCUMENTATION">Réservations</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="{{ route('admin.echanges.index') }}" title="Echanges">
                        <em class="fa fa-exchange"></em>
                        <span data-localize="sidebar.nav.DOCUMENTATION">Echanges</span>
                    </a>
                </li>
            </ul>
            <!-- END sidebar nav-->
        </nav>
    </div>
    <!-- END Sidebar (left)-->
</aside>

@push('scripts')
    <script type="text/javascript">
        /*
            ADD CLASS ACTIVE TO NAV LI
         */
        var page_title = "<?php echo $controller_name; ?>", li = $('li');
        li.each(function () {
            if ($(this).find('span')[0] && $(this).find('span')[0].innerHTML === page_title) {
                $(this).addClass('active');
            }
        });
    </script>
@endpush