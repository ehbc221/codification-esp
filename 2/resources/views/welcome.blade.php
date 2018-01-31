<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Codification ESP">
        <meta name="keywords" content="ESP, UCAD, codification, université">
        <title>{{ config('APP_NAME', 'Codification ESP') }} | Accueil</title>

        <!-- Bootstrap core CSS -->
        <link href="{{ asset('startbootstrap-landing-page/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="{{ asset('') }}" rel="stylesheet">
        <link href="{{ asset('startbootstrap-landing-page/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('startbootstrap-landing-page/vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
        <!-- Custom styles for this template -->
        <link href="" rel="stylesheet">
        <link href="{{ asset('startbootstrap-landing-page/css/landing-page.min.css') }}" rel="stylesheet">

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-light bg-light static-top">
            <div class="container">
                <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
                @guest()
                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-primary" href="{{ route('login') }}">Connexion</a>
                            <a class="btn btn-primary" href="{{ route('register') }}">Inscription</a>
                        </div>
                    </div>
                @endguest
                @auth()
                    <a class="btn btn-primary" href="{{ route('dashboard') }}">Dashboard</a>
                @endauth
            </div>
        </nav>

        <!-- Masthead -->
        <header class="masthead text-white text-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <h1 class="mb-5">Nous vous accompagnons dans votre processus de réservation et de codification pour bénéficier d'un logement à l'ESP.</h1>
                    </div>
                    <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                        <a href="{{ route('login') }}"><button class="btn btn-block btn-lg btn-primary">Connectez-vous pour commencer!</button></a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Icons Grid -->
        <section class="features-icons bg-light text-center" id="presentation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex">
                                <i class="icon-screen-desktop m-auto text-primary"></i>
                            </div>
                            <h3>Accessibilité</h3>
                            <p class="lead mb-0">Notre plateforme est accessible et s'adapte à tous les appareil disposant d'une connexion à internet.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex">
                                <i class="icon-layers m-auto text-primary"></i>
                            </div>
                            <h3>Ordonancement</h3>
                            <p class="lead mb-0">Suivez les étapes par ordre et vous pourrez vous codifier en quelques minutes.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                            <div class="features-icons-icon d-flex">
                                <i class="icon-check m-auto text-primary"></i>
                            </div>
                            <h3>Facilité</h3>
                            <p class="lead mb-0">Plateforme intuitive pour faciliter au maximum son utilisation.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Image Showcases -->
        <section class="showcase">
            <div class="container-fluid p-0">
                <div class="row no-gutters" id="authentification">
                    <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url({{ asset('img/entree.jpg') }});"></div>
                    <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                        <h2>Authentification</h2>
                        <p class="lead mb-0">Vous êtes un étudiant de l'ESP? Inscrivez-vous facilement sur notre plateforme et complétez votre profil pour bénéficier d'un accès à toutes les fonctionnalités de notre application.</p>
                    </div>
                </div>
                <div class="row no-gutters" id="reservation">
                    <div class="col-lg-6 text-white showcase-img" style="background-image: url({{ asset('img/batiment.jpg') }});"></div>
                    <div class="col-lg-6 my-auto showcase-text">
                        <h2>Réservation</h2>
                        <p class="lead mb-0">Une fois la période des codifications ouverte, choisissez en quelques clics la chambre qui vous plait pour la réserver au plus vite.</p>
                    </div>
                </div>
                <div class="row no-gutters" id="validation">
                    <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url({{ asset('img/chambre.jpg') }});"></div>
                    <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                        <h2>Validation</h2>
                        <p class="lead mb-0">Il ne vous restera plus qu'à consulter le mail que nous vous avons envoyé où vous trouverez toutes les informations vous permettant de valider votre résevation, qui sera éffective sur le moment. Ça y est, vous avez votre codification.</p>
                    </div>
                </div>
                <div class="row no-gutters" id="echange">
                    <div class="col-lg-6 text-white showcase-img" style="background-image: url({{ asset('img/echange.png') }});"></div>
                    <div class="col-lg-6 my-auto showcase-text">
                        <h2>Échange</h2>
                        <p class="lead mb-0">Vous avez changé d'avis? Ce n'est pas trop tard. Vous avez la possibilité d'échanger de chambre (dans les conditions de validité du délai)</p>
                    </div>
                </div>
                <div class="row no-gutters" id="proxmite">
                    <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url({{ asset('img/proximité.jpg') }});"></div>
                    <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                        <h2>Proximité</h2>
                        <p class="lead mb-0">Nous vous offrons la possibilité de voir les chambres ayant les étudiants avec lesquels vous pouvez avoir plus de proximité.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 h-100 text-center text-lg-left my-auto">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#presentation">Présentation</a>
                            </li>
                            <li class="list-inline-item">&sdot;</li>
                            <li class="list-inline-item">
                                <a href="#authentification">Authentification</a>
                            </li>
                            <li class="list-inline-item">&sdot;</li>
                            <li class="list-inline-item">
                                <a href="#reservation">Réservation</a>
                            </li>
                            <li class="list-inline-item">&sdot;</li>
                            <li class="list-inline-item">
                                <a href="#validation">Validation</a>
                            </li>
                            <li class="list-inline-item">&sdot;</li>
                            <li class="list-inline-item">
                                <a href="#echange">Échange</a>
                            </li>
                            <li class="list-inline-item">&sdot;</li>
                            <li class="list-inline-item">
                                <a href="#proxmite">Proximité</a>
                            </li>
                        </ul>
                        <p class="text-muted small mb-4 mb-lg-0">&copy; 2018. ESP - Tous droits réservés.</p>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Bootstrap core JavaScript -->
        <script src="{{ asset('startbootstrap-landing-page/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('startbootstrap-landing-page/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    </body>

</html>
