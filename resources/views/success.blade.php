@extends('layouts.header-footer')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="my-3">Ваш заказ успешно оформлен!</h3>
                @if(Session::get('success') === 1)
                    <p>При получении скажите продавцу номер вашего телефона!</p>
                    @elseif(Session::get('success') === 2)
                    <p>Заказ будет доставлен в ближайшее время!</p>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        app.setCookie('cart', '', {'max-age': -1});
        app.setCookie('avail_cart', '', {'max-age': -1});
    </script>
@endsection