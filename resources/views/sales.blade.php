@extends('layouts.header-footer')

@section('main')
    <div class="catalog-line" xmlns:v-on="http://www.w3.org/1999/xhtml">
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
                            <span class="text-muted">Скидки</span>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="line mb-5">
            <div class="content container">
                <div class="row m-0 pl-3">
                    <div class="catalog-container col">
                        <div class="category-title title mb-3">
                            <div class="row border-bottom">
                                <h3>Скидки</h3>
                            </div>
                        </div>
                        <div class="catalog-products mb-5">
                            <div class="row">
                                @foreach($sales as $product)
                                    {{--ссылка на карточку товара--}}
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4 p-0 pr-3">
                                        <div class="product card h-100">
                                            <div class="catalog-product-img">
                                                <div class="pt-3 pr-1">
                                                    <object data="" type="">
                                                        <a href="#" v-on:click="safeToFav({{$product -> id}}, 'liked_prod')"
                                                           class="liked-icon col d-flex justify-content-end text-dark"> {{--добавление в избранное--}}
                                                            <i  class="far fa-heart"></i>
                                                        </a>
                                                    </object>
                                                </div>
                                                <img src="{{asset( $product -> img -> path )}}"
                                                     alt="{{ $product -> product_name }}"
                                                     class="card-img-top">
                                            </div>
                                            <a href="/catalog/{{ $product -> category -> supercategory -> id }}/categories/{{ $product -> category -> id }}/{{ $product -> id }}">
                                                <div class="card-body">
                                                    <div
                                                            class="card-title text-muted mb-5">{{ $product -> product_name }}</div>
                                                    <div class="row justify-content-between m-0">
                                                        <div
                                                                class="price card-text text-danger mt-auto mb-auto">{{ $product -> price }}
                                                            &#8381
                                                        </div>
                                                        <button class="more-btn border-0"><span class="text-dark">Подробнее</span>
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
