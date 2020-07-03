
<!-- Slider -->
@extends('layouts.header-footer')

@section('main')
<div
    id="carouselExampleIndicators"
    class="carousel slide mb-4"
    data-ride="carousel"
>
    <ol class="carousel-indicators">
        <li
            data-target="#carouselExampleIndicators"
            data-slide-to="0"
            class="active"
        ></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <img
                class="d-block img-fluid"
                src="{{asset('img/slider/slide1.jpg')}}"
                alt="First slide"
            />
        </div>
        <div class="carousel-item">
            <img
                class="d-block img-fluid"
                src="{{asset('img/slider/slide2.jpg')}}"
                alt="Second slide"
            />
        </div>
        <div class="carousel-item">
            <img
                class="d-block img-fluid"
                src="{{asset('img/slider/slide3.jpg')}}"
                alt="Third slide"
            />
        </div>
    </div>
    <a
        class="carousel-control-prev"
        href="#carouselExampleIndicators"
        role="button"
        data-slide="prev"
    >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a
        class="carousel-control-next"
        href="#carouselExampleIndicators"
        role="button"
        data-slide="next"
    >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- Page Content -->
<div class="container pb-5">
    <!-- New items -->
    <div class="newItems">
        <div class="d-flex justify-content-between">
            <h3>Новинки</h3>
            <div class="chevrons justify-content-between text-right" id="chevrons" >
                <i class="fa fa-angle-left fa-2x owl-next customPrevBtn col-1"></i>
                <i class="fa fa-angle-right fa-2x customNextBtn col-1"></i>
            </div>
        </div>
        <div class="owl-carousel mb-3 h-100">
            @foreach($new as $item)
            <div class="item">
                <div class="card h-100 d-flex flex-column justify-content-between">
                    <div class="catalog-product-img">
                        <div class="pt-3 pr-1">
                            <object data="" type="">
                                <a v-on:click="safeToFav({{$item -> id}}, 'liked_prod')"
                                   class="liked-icon col d-flex justify-content-end text-dark"
                                   style="cursor: pointer;"> {{--добавление в избранное--}}
                                    <i  class="far fa-heart"></i>
                                </a>
                            </object>
                        </div>
                        <img src="{{asset( $item -> img -> path )}}"
                             alt="{{ $item -> product_name }}"
                             class="card-img-top">
                    </div>
                    <a href="/catalog/{{ $item -> category -> supercategory -> id }}/categories/{{ $item -> category -> id }}/{{ $item -> id }}">
                        <div class="card-body">
                            <div class="card-title text-muted mb-5">{{ $item -> product_name }}</div>
                        </div>
                        <div class="card-footer">
                            <div class="row justify-content-between m-0">
                                <div class="price card-text text-danger mt-auto mb-auto">{{ $item -> price }}
                                    &#8381
                                </div>
                                <button class="more-btn border-0"><span>Подробнее</span>
                                </button>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Sold -->
    <div class="sold">
        <div class="d-flex justify-content-between">
            <h3>Скидки</h3>
            <a href="/sales">Все скидки</a>
        </div>
        <div class="row">
            @foreach($sale as $item)
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card h-100 d-flex flex-column justify-content-between">
                    <div class="catalog-product-img">
                        <div class="pt-3 pr-1">
                            <object data="" type="">
                                <a v-on:click="safeToFav({{$item -> id}}, 'liked_prod')"
                                   class="liked-icon col d-flex justify-content-end text-dark"
                                   style="cursor: pointer;"> {{--добавление в избранное--}}
                                    <i  class="far fa-heart"></i>
                                </a>
                            </object>
                        </div>
                        <img src="{{asset( $item -> img -> path )}}"
                             alt="{{ $item -> product_name }}"
                             class="card-img-top">
                    </div>
                    <a href="/catalog/{{ $item -> category -> supercategory -> id }}/categories/{{ $item -> category -> id }}/{{ $item -> id }}">
                        <div class="card-body">
                            <div
                                    class="card-title text-muted mb-5">{{ $item -> product_name }}</div>

                        </div>
                        <div class="card-footer mt-auto">
                            <div class="row justify-content-between m-0">
                                <div class="price card-text text-danger mt-auto mb-auto">{{ $item -> price }}
                                    &#8381
                                </div>
                                <button class="more-btn border-0"><span>Подробнее</span>
                                </button>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
<!-- /.container -->

<!-- Bootstrap core JavaScript -->
@section('script')
<script src="{{asset('vendor/owlcaroussel/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
@endsection
