@extends('layouts.header-footer')

@section('main')

    <div class="product-line" xmlns:v-on="http://www.w3.org/1999/xhtml">
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
                            <a href="/catalog/{{ $supercateg -> id }}/categories/{{ $category->id }}">
                                <span class="text-muted">{{$category -> category_name}}</span>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="text-muted">{{$product -> product_name}}</span>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container content-line">
            <div class="product-cart mb-5">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 img">
                        <img src="{{ asset( $product -> img -> path ) }}" alt="" class="product-img img-fluid">
                    </div>
                    <div class="col d-flex justify-content-between">
                        <div class="product-body">
                            <div class="product-title row">
                                <div class="col">
                                    <h3>{{$product -> product_name}}</h3>
                                </div>
                            </div>
                            <div class="articul row text-muted">
                                <div class="col">
                                    <span>Артикул: {{ $product -> code }}</span>
                                </div>
                            </div>
                            <div class="row price mt-4">
                                <div class="col">
                                    <h3>{{ $product -> price }} &#8381</h3>
                                </div>
                            </div>
                            <div class="availability row mt-1">
                                <div class="col">
                                    @if($product-> is_available)
                                        <div class="text-success">
                                            <i class="fas fa-check"></i>
                                            <span>В наличии</span>
                                        </div>
                                    @else
                                        <div class="text-danger">
                                            <i class="fas fa-times"></i>
                                            <span>Нет в наличии</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="col choose-input">
                                    @if($supercateg -> supercategory_name === 'Для мужчин' or $supercateg -> supercategory_name === 'Для женщин')
                                        <div class="row">
                                            <div class="col size">
                                                <select class="size-choose col" v-model="size">
                                                    @foreach($sizes as $size)
                                                        <option value="{{ $size -> id }}">{{ $size -> size }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row shopping-card mt-5 pt-3">
                                <div class="col">
                                    @if($product-> is_available)
                                        <button class="card-btn" v-on:click="safeToCart({{$product -> id}}, 'cart', {{$product->price}})">В корзину</button>
                                    @else
                                        <button disabled class="card-btn-disabled">В корзину</button>
                                    @endif
                                </div>
                                <div class="col liked">
                                    <button class="liked-btn" v-on:click="safeToFav({{$product -> id}}, 'liked_prod')"><i class="far fa-heart"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row product-info mt-5">
                    <div class="col-lg-12 col-md-8 col-sm-3">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active text-dark" id="nav-descr-tab" data-toggle="tab" href="#nav-descr" role="tab" aria-controls="nav-descr" aria-selected="true">Описание</a>
                                <a class="nav-item nav-link text-dark" id="nav-charact-tab" data-toggle="tab" href="#nav-charact" role="tab" aria-controls="nav-charact" aria-selected="false">Характеристики</a>
                                <a class="nav-item nav-link text-dark" id="nav-delivery-tab" data-toggle="tab" href="#nav-delivery" role="tab" aria-controls="nav-delivery" aria-selected="false">Доставка</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-descr" role="tabpanel" aria-labelledby="nav-descr-tab">
                                <div class="col-lg-8 pt-3">
                                    {{ $product -> description }}
                                </div>
                            </div>
                            <div class="tab-pane fade mb-5" id="nav-charact" role="tabpanel" aria-labelledby="nav-charact-tab">
                                <div class="col pt-3">
                                    <span><strong>Цвет: </strong>{{ $product -> color }}</span></br>
                                    <span><strong>Бренд: </strong>{{ $product -> characteristics -> brand }}</span></br>
                                    <span><strong>Вес: </strong>{{ $product -> characteristics -> weight }} гр</span></br>
                                    <span><strong>Материал: </strong>{{ $product -> characteristics -> material  }}</span></br>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-delivery" role="tabpanel" aria-labelledby="nav-delivery-tab">
                                <div class="col">
                                    <div class="mt-3 mb-4">
                                        <strong>Доставка по городу Томск</strong>
                                        <p>Ближайшая дата: через 2-7 дней, 400 Р. При заказе от 5000 Р доставка бесплатная</p>
                                    </div>
                                    <div class="mt-3">
                                        <strong>Доставка по другим регионам</strong>
                                        <p>Подробные условия доставки можно узнать <a href="/delivery" class="text-dark"><u>здесь</u></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @if(!($supercateg -> supercategory_name === 'Для мужчин' or $supercateg -> supercategory_name === 'Для женщин'))
        <script>
            app.size = '9';
        </script>
    @endif
@endsection
