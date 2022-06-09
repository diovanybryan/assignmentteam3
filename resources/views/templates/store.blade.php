<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title') - Store</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{asset("assets/dist/assets/favicon.ico")}}" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href={{asset("assets/dist/css/styles.css")}} rel="stylesheet" />
    </head>

    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="/">Store</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        @yield('content')
                    </ul>
                    <form class="d-flex" method="post" action="/logout">
                        @csrf
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi bi-x-octagon-fill"></i>
                            Logout
                            <span class="badge bg-dark text-white ms-1 rounded-pill">{{Auth::user()->name}}</span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            @yield('header')
        </header>
        <!-- Section-->
        <section class="py-5">
            @yield('section')
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <!-- @yield('footer') -->
            <div class="container"><p class="m-0 text-center text-white">{{strtoupper(Auth::user()->role)}} - TRAINING LARAVEL &copy;IBIS HOTEL 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src={{asset("assets/dist/css/styles.css")}}></script>
    </body>
</html>
