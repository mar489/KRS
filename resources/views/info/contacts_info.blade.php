@extends('layouts.header-footer')

@section('main')
    <div class="content-line my-5">
        <div class="container">
            <div class="container-2">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h3>Контакты</h3>
                        </div>
                    </div>
                </div>
                <div class="map">
                    <div class="row">
                        <div class="col-lg-7 col-md-7 col-sm-12 p-0">
                            <iframe class="col-12"
                            src="https://yandex.ru/map-widget/v1/?um=constructor%3Abb1ed848cf58fbd0bd2a8af89a9c327c3199363f68a5536ac987b262ddf953ea&amp;
                            source=constructor" width="550" height="310" frameborder="0"></iframe>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 m-auto">
                            <h5>Адрес</h5>
                            <p>г.Томск, ул. Кирова, 2</p>
                            <h5>Режим работы магазина</h5>
                            <p>
                                Будние дни: 09:30-21:00<br>
                                Выходные и праздничные дни: 10:30-18:30
                            </p>
                            <h5>Контакты</h5>
                            <p>
                                тлф: 8-800-123-45-67<br>
                                e-mail: prestige@gmail.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
