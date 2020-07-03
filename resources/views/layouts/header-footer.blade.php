<!DOCTYPE html>
<html lang="ru" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Prestige</title>

    <link href="{{ asset('/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{ asset('/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('/css/admin/styles.css')}}" rel="stylesheet">

    <link href="{{asset('/vendor/owlcaroussel/owl.carousel.min.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"/>

    <link href="{{ asset('img/logo/logo.svg')}}" rel="icon">

</head>
<body class="h-100 d-flex flex-column">
<header>
    @if(Auth::check())
        <a href="/admin"><i class="fa fa-user-shield admin-mark m-3"></i></a>
    @endif


    {{--Contacts--}}
    <div class="row bg-dark header-info">
        <div class="container py-1">
            <span class="col">Горячая линия:  8-800-123-45-67</span>

        </div>
    </div>

    {{--Navigation--}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a href="/" class="col-2"><img class="main-logo" src="{{ asset('img/logo/logo.svg')}}" alt="main-logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto justify-content-start pt-1 mt-1">
                    <li class="nav-item dropdown">
                        <a class="item nav-link nav-title text-dark dropdown-toggle" role="button" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            КАТАЛОГ
                        </a>
                        <ul class="dropdown-menu multi-column columns-4" aria-labelledby="navbarDropdown">
                            <div class="row m-0">
                                @foreach($supercategories as $supercategory)
                                    <div class="col-lg-4 col-sm-4 mb-3">
                                        <ul class="multi-column-dropdown">
                                            <h5 class="dropdown-header pl-3 font-weight-bold">{{ $supercategory -> supercategory_name }}</h5>
                                            @foreach($supercategory->categories as $category)
                                                <li>
                                                    <a class="dropdown-item pl-4" href="/catalog/{{ $supercategory -> id }}/categories/{{ $category->id }}">{{ $category->category_name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-title text-dark" href="/delivery">ДОСТАВКА</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-title text-dark" href="/contacts">КОНТАКТЫ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-title text-dark" href="/sales">СКИДКИ</a>
                    </li>
                </ul>
                <div class="row justify-content-end">
                    <a class="col" href="/favourites"><img class="icon mt-2" src="{{ asset('img/icons/heart.svg')}}" alt="liked"></a>
                    <a class="col" href="/shopping_cart"><img class="icon mt-2" src="{{ asset('img/icons/shopping-cart.svg')}}" alt="shopping-cart"> </a>
                </div>
            </div>
        </div>
    </nav>
</header>
<main id="main">
    @yield('main')
</main>
<footer class="footer mt-auto pt-4 pb-4">
    <div class="content container">
        <div class="row ">
            <div class="col">
                <span class="col-title">Информация</span>
                <div>
                    <a href="/delivery" class="col-content">Доставка</a>
                    <a href="/confidentiality" class="col-content">Пользовательское соглашение</a>
                </div>
            </div>
            <div class="col">
                <span class="col-title">Покупателю</span>
                <div>
                    <a href="/sales" class="col-content">Скидки</a>
                    <a href="/payment" class="col-content">Оплата</a>
                    <a href="/faq" class="col-content">Вопросы</a>
                </div>
            </div>
            <div class="col">
                <span class="col-title">Контакты</span>
                <div>
                    <span class="col-content">г.Томск,ул.Кирова 2</span>
                    <span class="col-content">8-800-123-45-67</span>
                    <span class="col-content">Prestige@gmail.com</span>
                </div>
            </div>
            <div class="col mt-2 mb-2 subscribe-box justify-content-end text-white">
                <div class="row">
                    <span class="col-title pl-3 pr-3">СКИДКИ, АКЦИИ, НОВОСТИ - ПОДПИШИТЕСЬ!</span>
                </div>
                <div class="row">
                    <div class="col">
                        <input class="subscribe-email" type="text" placeholder="Ваш e-mail">
                        <div class="subscribe-agreement">
                            <img src="{{ asset('img/icons/check.svg') }}" alt="check">
                            <span class="">Принимаю <a href="/confidentiality" class="text-white">пользовательское соглашение</a></span>
                        </div>
                    </div>
                </div>
                <div class="row pl-3 pr-3">
                    <button class="subscribe-btn">Подписаться</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center social-icons mt-3 mb-2">
                <a href=""><img src="{{ asset('img/icons/social/vk.svg') }}" alt="vk-icon"></a>
                <a href=""><img src="{{ asset('img/icons/social/instagram.svg') }}" alt="instagram-icon"></a>
                <a href=""><img src="{{ asset('img/icons/social/facebook.svg') }}" alt="facebook-icon"></a>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('/js/jquery.js')}}"></script>
<script src="{{ asset('/js/bootstrap.js')}}"></script>
<script src="{{ asset('/js/popper.js')}}"></script>
<script src="{{ asset('/js/vue.js') }}"></script>
<script src="{{ asset('/js/main.js') }}"></script>
@yield('script')
</body>
</html>
