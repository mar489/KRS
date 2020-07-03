@extends('layouts.header-footer')

@section('main')
    <div class="container">
        <div class="row text-center my-3">
            <div class="col">
                <h3>Переход на сторонний сервис для оплаты</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-6 text-right">
                <a href="/shopping_cart">
                    <button type="button" class="btn btn-danger rounded-0">Отмена оплаты</button>
                </a>
            </div>
            <div class="col-6 text-left">
                <form method="post" action="/order/online">
                    <button type="submit" class="btn btn-success rounded-0">Успешная оплата</button>
                    @foreach($request as $key => $value)
                        <input type="hidden" name="{{$key}}" value="{{$value}}">
                    @endforeach
                </form>
            </div>
        </div>
    </div>
@endsection