<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Skin Hub</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assetsHome/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="cssHome/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand">Skin Hub</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4 invisible">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Tipo</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/">Todas skins</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="/facas">Facas</a></li>
                            <li><a class="dropdown-item" href="/luvas">Luvas</a></li>
                            <li><a class="dropdown-item" href="/riflesDeAssalto">Rifles de Assalto</a></li>
                            <li><a class="dropdown-item" href="/riflesDePrecisao">Rifles de Precisão</a></li>
                            <li><a class="dropdown-item" href="/submetralhadoras">Submetralhadoras</a></li>
                            <li><a class="dropdown-item" href="/pistolas">Pistolas</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" action="{{ route('login') }}">
                    <button class="btn btn-outline-dark me-3" type="submit">
                        Login
                    </button>
                </form>

                <form class="d-flex" action="{{ route('registrar') }}">
                    <button class="btn btn-outline-dark me-3" type="submit">
                        Cadastre-se
                    </button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">SKIN HUB</h1>
                <p class="lead fw-normal text-white-50 mb-0">Maior site de compra de skins</p>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach($skins as $linha)
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img style='width: 250px' class="card-img-top" src="{{ $linha->url_imagem }}" alt="..." />

                        <hr style="border: 1px solid #000; width: 100%;">
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center d-flex flex-column">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{$linha->arma_nome}} / {{$linha->skin_nome}}</h5>
                                <!-- Product price-->
                                <span>R${{$linha->valor}}</span>
                                <span>{{$linha->exterior}}</span>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a href="{{ route('login') }}" class="btn btn-outline-dark mt-auto" href="#">Comprar</a></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="jsHome/scripts.js"></script>
</body>

</html>