@extends('layouts.header-footer')

@section('main')
    <div class="content-line">
        <div class="container">
            @if(!empty($products[0]))
                <div class="title col-md-10 col-xl-10 mx-auto pt-3 pb-3">
                    <div class="row">
                        <h3 class="col">Избранное</h3>
                    </div>
                </div>
                <div class="row">
                    @foreach($products as $item)
                        <div class="col-md-10 col-xl-10 mb-3 mx-auto">
                            <div class="card h-100">
                                <div class="row no-gutters h-100">
                                    <div class="col-4 col-lg-2">
                                        <img src="{{asset($item->img->path)}}" class="card-img"
                                             alt="{{$item->product_name}}" style="object-fit: cover; height: 13rem">
                                    </div>
                                    <div class="col-8 col-lg-10">
                                        <div class="card h-100 border-0">
                                            <div class="card-body h-100">
                                                <div class="card-title row">
                                                    <h6 class="col-10">
                                                        <a class="text-dark d-inline-block"
                                                           href="/catalog/{{$item->category->supercategory_id}}/categories/{{$item->category->id}}/{{$item->id}}">{{$item->product_name}}</a>
                                                    </h6>
                                                    <div class="col-2">
                                                        <span class="d-inline-block close fas fa-times" v-on:click="deleteFav({{$item->id}})"></span>
                                                    </div>
                                                </div>
                                                <p class="card-text text-danger">{{$item->price}} &#8381</p>
                                                @if($item -> is_available)
                                                    <p class="card-text text-success mb-auto">
                                                        <i class="fas fa-check"></i>
                                                        <span>В наличии</span>
                                                    </p>
                                                @else
                                                    <p class="card-text text-danger mb-auto">
                                                        <i class="fas fa-times"></i>
                                                        <span>Нет в наличии</span>
                                                    </p>
                                                @endif
                                            </div>
                                            <div class="card-footer border-0 bg-transparent">
                                                <a href="/catalog/{{$item->category->supercategory_id}}/categories/{{$item->category->id}}/{{$item->id}}">
                                                    <button type="button" class="border-0 px-3 py-2">Подробнее</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="title col-md-10 col-xl-10 mx-auto py-3">
                    <div class="row">
                        <h3 class="col">Избранное</h3>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="title col-md-10 col-xl-10 mx-auto">
                        <h5>В избранном нет товаров</h5>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
