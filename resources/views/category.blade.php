@extends('layouts.header-footer')

@section('main')
    <div class="catalog-line">
        <div class="container bread-crumbs">
            <div class="row">
                <div class="col">
                    <ol class="breadcrumb bread">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-muted">Главная</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="text-muted">Каталог</span>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="text-muted">{{$category -> category_name}}</span>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="line mb-5">
            <div class="content container">
                <div class="row">
                    <div class="aside-menu  col-lg-3">
                        @include('aside-menu')
                    </div>
                    <div class="catalog-container col">
                        <div class="category-title title mb-3">
                            <div class="row border-bottom">
                                <h3>{{$category -> category_name}}</h3>
                            </div>
                        </div>
                        <div class="catalog-products mb-5">
                            <div class="row">
                                @foreach($category -> products as $product)
                                    {{--ссылка на карточку товара--}}
                                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4 p-0 pr-3">
                                        <div class="product card h-100 d-flex flex-column justify-content-between">
                                            <div class="catalog-product-img">
                                                <div class="pt-3 pr-1">
                                                    <object data="" type="">
                                                        <a href="#"
                                                           v-on:click="safeToFav({{$product -> id}}, 'liked_prod')"
                                                           class="liked-icon col d-flex justify-content-end text-dark"> {{--добавление в избранное--}}
                                                            <i class="far fa-heart"></i>
                                                        </a>
                                                    </object>
                                                </div>
                                                <img src="{{asset( $product -> img -> path )}}"
                                                     alt="{{ $product -> product_name }}"
                                                     class="card-img-top">
                                            </div>
                                            <a href="/catalog/{{ $supercateg -> id }}/categories/{{ $category -> id }}/{{ $product -> id }}">
                                                <div class="card-body">
                                                    <div
                                                        class="card-title text-muted">{{ $product -> product_name }}</div>
                                                    <div class="row justify-content-between m-0">
                                                    </div>
                                                </div>
                                                <div class="card-footer mt-auto">
                                                    <div class="row justify-content-between m-0"><div
                                                            class="price card-text text-danger mt-auto mb-auto">{{ $product -> price }}
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
                </div>
            </div>
        </div>
    </div>
@endsection
