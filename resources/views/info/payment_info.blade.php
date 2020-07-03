@extends('layouts.header-footer')

@section('main')
    <div class="content-line my-5">
        <div class="container">
            <div class="container-2 col-lg-8 mx-auto">
                <div class="title payment">
                    <div class="row">
                        <div class="col">
                            <h3>Оплата</h3>
                        </div>
                    </div>
                </div>
                <div class="payment-content">
                    <div class="payment-cards">
                        <div class="dropdown-divider"></div>
                        <div class="row">
                            <div class="col py-3">
                                <h5>Наличные</h5>
                                <p>Заказы на сайте и покупки в розничных магазинах можно оплатить наличными.</p>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="row">
                            <div class="col py-3">
                                <h5>Банковская карта</h5>
                                <p>Заказы на сайте можно оплатить онлайн или банковской картой при получении.<br>
                                    Это удобно, быстро и безопасно. <br>
                                    Мы принимаем к оплате банковские карты платежных систем: Visa, MasterCard, МИР.
                                </p>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="col py-3 px-0">
                            <div class="col-l-6 px-0">
                                <span>
                                    Для оплаты необходимо ввести данные:<br>
                                    Номер карты ‒ 16 цифр на лицевой стороне карты;<br>
                                    Срок действия в формате ММ/ГГ;<br>
                                    Имя держателя карты в точности так же, как они написаны на карте;<br>
                                    CVC/CVV ‒ цифровой номер на обратной стороне карты.</span>
                            </div>
                            <div class="my-3">
                                <img class="col-lg-7" src="{{ asset('img/static/card.jpg') }}" alt="схема банковской карты">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
