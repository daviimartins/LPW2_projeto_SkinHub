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
    <link href="{{ asset('cssHome/styles.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand">Skin Hub</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Tipo</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('filtrar_skins', 'todas') }}">Todas
                                    skins</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="{{ route('filtrar_skins', 'faca') }}">Facas</a></li>
                            <li><a class="dropdown-item" href="{{ route('filtrar_skins', 'luva') }}">Luvas</a></li>
                            <li><a class="dropdown-item" href="{{ route('filtrar_skins', 'Rifle De Assalto') }}">Rifles
                                    de Assalto</a></li>
                            <li><a class="dropdown-item" href="{{ route('filtrar_skins', 'Rifle De Precisão') }}">Rifles
                                    de Precisão</a></li>
                            <li><a class="dropdown-item" href="{{ route('filtrar_skins', 'Submetralhadora') }}">Submetralhadoras</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('filtrar_skins', 'Pistola') }}">Pistolas</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    <button type="button" class="btn btn-outline-dark me-3" data-bs-toggle="modal"
                        data-bs-target="#cartModal">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill">
                            {{ \App\Models\Carrinho::where('user_id', Auth::id())->count() }}
                        </span>
                    </button>
                </form>

                <form class="d-flex">
                    <button class="btn btn-outline-dark me-3">
                        <span>Usuário: {{ Auth::user()->name }}</span>
                    </button>
                </form>

                <form class="d-flex">
                    <a href="/" class="btn btn-outline-dark">
                        <span>Sair</span>
                    </a>
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
                            <div class="text-center">
                                <form action="{{ route('carrinho.add', $linha->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-dark mt-auto">Comprar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- Modal do Carrinho -->
        <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cartModalLabel">Seu Carrinho</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @php
                        $carrinhoItems = \App\Models\Carrinho::where('user_id', Auth::id())->with('skin')->get();
                        @endphp

                        @if($carrinhoItems->isEmpty())
                        <p>Seu carrinho está vazio.</p>
                        @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Skin</th>
                                    <th>Quantidade</th>
                                    <th>Preço</th>
                                    <th>Ações</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($carrinhoItems as $item)
                                <tr>
                                    <td>{{ $item->skin->arma_nome }} / {{ $item->skin->skin_nome }}</td>
                                    <td>{{ $item->quantidade_itens }}</td>
                                    <td>R${{ $item->skin->valor }}</td>
                                    <td>
                                        <form action="{{ route('carrinho.remove', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Remover</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <form action="{{ route('stripe.checkout') }}" method="POST"
                            style="display:inline;">
                            @csrf
                            <input type="hidden" name="carrinhoItems" value="{{ json_encode($carrinhoItems) }}">
                            <button type="submit" class="btn btn-primary">Finalizar Compra</button>
                        </form>
                    </div>
                </div>
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