@extends('layouts.header-footer')

@section('main')
    <div class="line pt-5 pb-5">
        <div class="container title">
            <div class="border-bottom col pl-0">
                <h3 class="text-uppercase title">Каталог</h3>
            </div>
        </div>
        <div class="container content mt-3">
            <div class="row">
                <div class="aside-menu col-lg-3">
                    @include('aside-menu')
                </div>
                <div class="catalog-blocks">
                    <div class="col-lg-9 col-md-12">
                        <div class="row">
                            <a class="catalog-item mb-3 col-lg-4">
                                <div class="catalog-item-img"><img src="" alt=""></div>
                                <div class="catalog-item-text p-4"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
