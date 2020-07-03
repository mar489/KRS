@extends('layouts.header-footer')

@section('main')
    <div class="content-line" xmlns:v-on="http://www.w3.org/1999/xhtml" xmlns:v-bind="http://www.w3.org/1999/xhtml">
        <div class="container">
            @if(!empty($products))
                <div class="title pt-3 pb-3">
                    <div class="row">
                        <h3 class="col">Оформление заказа</h3>
                    </div>
                </div>
                <div class="content-products">
                    <div class="row liked-products">
                        @foreach($products as $item)
                            <div class="col-md-10 col-xl-10 mb-3 mx-auto">
                                <div class="card h-100">
                                    <div class="row no-gutters h-100">
                                        <div class="col-4 col-lg-2">
                                            <img src="{{asset($item['product']->img->path)}}" class="card-img"
                                                 alt="{{$item['product']->product_name}}"
                                                 style="object-fit: cover; height: 13rem">
                                        </div>
                                        <div class="col-8 col-lg-10">
                                            <div class="card h-100 border-0">
                                                <div class="card-body h-100">
                                                    <div class="card-title row">
                                                        <h6 class="col-10">
                                                            <a class="text-dark d-inline-block"
                                                               href="/catalog/{{$item['product']->category->supercategory_id}}/categories/{{$item['product']->category->id}}/{{$item['product']->id}}">{{$item['product']->product_name}}</a>
                                                        </h6>
                                                        <div class="col-2">
                                                        <span class="d-inline-block close fas fa-times"
                                                              v-on:click="deleteCart({{$item['product']->id}}, {{$item['size']}})"></span>
                                                        </div>
                                                    </div>
                                                    <p class="card-text text-danger">{{$item['product']->price}}
                                                        &#8381</p>
                                                    @if($item['product'] -> category ->supercategory -> supercategory_name === 'Для мужчин' or $item['product'] -> category -> supercategory -> supercategory_name === 'Для женщин')
                                                    <p class="card-text">
                                                        <span class="font-weight-bold">Размер: </span> {{$sizes->find($item['size'])->size}}
                                                    </p>
                                                    @endif
                                                </div>
                                                <div class="card-footer border-0 bg-transparent">
                                                    <button type="button"
                                                            class="d-inline-block px-2 minus border-0 bg-transparent"
                                                            v-on:click="safeToCartFromCart({{$item['product']->id}}, '{{$item['size']}}', 'minus')">
                                                        -
                                                    </button>
                                                    <input type="number" class="d-inline-block counter"
                                                           value="{{$item['count']}}"
                                                           name="amount{{$item['product']->id}}">
                                                    <button type="button"
                                                            class="d-inline-block px-2 plus border-0 bg-transparent"
                                                            v-on:click="safeToCartFromCart({{$item['product']->id}}, '{{$item['size']}}', 'plus')">
                                                        +
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <form method="post" action="/order/create" v-on:submit="setFinal">
                    @csrf
                    <div>
                        <div class="container">
                            <!-- Способ доставки -->
                            <section class="step">
                                <div class="d-flex p-2">
                                    <div class="step-number">1</div>
                                    <h3>Способ доставки</h3>
                                </div>
                                <div class="row justify-content-md-center">
                                    <div class="col-lg-4 col-sm-6 m-3">
                                        <div class="form_radio_btn h-100 w-100">
                                            <input id="radio-1" type="radio" name="delivery" value='0' required
                                                   v-model="delivery" v-on:change="updatePrice">
                                            <label for="radio-1" class="btn btn-block btn-success order-btn pt-2">
                                                САМОВЫВОЗ<br/>
                                                <span>Бесплатно</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 m-3">
                                        <div class="form_radio_btn h-100 w-100">
                                            <input id="radio-2" type="radio" name="delivery" value='1'
                                                   v-model="delivery" v-on:change="updatePrice">
                                            <label for="radio-2" class="btn btn-block btn-success order-btn pt-2">КУРЬЕРСКАЯ
                                                СЛУЖБА <br/>
                                                <span>Бесплатно от 5000 р</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                @error('delivery')
                                <div class="invalid-feedback pl-3" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </section>
                            <!-- Контактные данные -->
                            <section class="step">
                                <div class="d-flex p-2">
                                    <div class="step-number">2</div>
                                    <h3>Контактные данные</h3>
                                </div>
                                <div class="form mx-4">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6 my-3">
                                            <input type="text" placeholder="Имя" class="form-control" name="name"
                                                   required value="{{old('name')}}"/>
                                            @error('name')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-3 col-sm-6 my-3">
                                            <input type="text" placeholder="Фамилия" name="surname" class="form-control"
                                                   required value="{{old('surname')}}"/>
                                            @error('surname')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-3 col-sm-6 my-3">
                                            <input type="text" placeholder="Отчество" name="patronymic"
                                                   class="form-control" value="{{old('patronymic')}}"/>
                                            @error('patronymic')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-3 col-sm-6 my-3">
                                            <input type="phone" placeholder="Телефон" name="phone" id="phone" class="form-control m-0"
                                                   required value="{{old('phone')}}"/>
                                            @error('phone')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <h5>Адрес доставки</h5>
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6 my-3">
                                            <select class="form-control" name="city" required>
                                                <option value="Томск">Томск</option>
                                                <option value="Новосибирск">Новосибирск</option>
                                                <option value="Кемерово">Кемерово</option>
                                                <option value="Омск">Омск</option>
                                                <option value="Москва">Москва</option>
                                                <option value="Санкт-Петербург">Санкт-Петербург</option>
                                                <option value="Кемерово">Ростов-на-Дону</option>
                                            </select>
                                            @error('city')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-3 col-sm-6 my-3">
                                            <input type="text" placeholder="Улица" name="street" class="form-control"
                                                   v-bind:disabled="delivery === '0' || delivery===''"
                                                   v-bind:required="delivery === '1'"
                                                   value="{{old('street')}}"/>
                                            @error('street')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-3 col-sm-6 my-3">
                                            <input type="text" placeholder="Дом" name="house" class="form-control"
                                                   v-bind:disabled="delivery === '0' || delivery===''"
                                                   v-bind:required="delivery === '1'"
                                                   value="{{old('house')}}"/>
                                            @error('house')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-3 col-sm-6 my-3">
                                            <input type="text" placeholder="Квартира" name="ap" class="form-control"
                                                   v-bind:disabled="delivery === '0' || delivery===''"
                                                   v-bind:required="delivery === '1'"
                                                   value="{{old('ap')}}"/>
                                            @error('ap')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <textarea
                                            class="form-control"
                                            name="comments"
                                            placeholder="Комментарий к заказу"
                                            cols="30"
                                            rows="10" maxlength="255">
                                        {{old('comments')}}
                                    </textarea>
                                    @error('comments')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </section>
                            <!-- Оплпата -->

                            <section class="step">
                                <div class="d-flex p-2">
                                    <div class="step-number">3</div>
                                    <h3>Оплата</h3>
                                </div>
                                <div class="row justify-content-md-center">
                                    <div class="col-lg-4 col-sm-6 m-3">
                                        <div class="form_radio_btn h-100 w-100">
                                            <input id="radio-3" type="radio" name="pay" value="0" required>
                                            <label for="radio-3" class="btn btn-block btn-success order-btn pt-3">
                                                ПРИ ПОЛУЧЕНИИ
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 m-3">
                                        <div class="form_radio_btn h-100 w-100">
                                            <input id="radio-4" type="radio" name="pay" value="1">
                                            <label for="radio-4" class="btn btn-block btn-success order-btn pt-3">
                                                ОНЛАЙН
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                @error('pay')
                                <div class="invalid-feedback pl-3" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </section>
                            <section class="step">
                                <div class="d-flex p-2">
                                    <div class="step-number">4</div>
                                    <h3>Итог</h3>
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col ml-4 pl-lg-4">
                                        {{count($products)}} товаров на сумму
                                    </div>
                                    <div class="col-3">@{{ res }}&#8381;</div>
                                </div>
                                <div class="row justify-content-between" v-if="delivery === '1'">
                                    <div class="col ml-4 pl-lg-4">
                                        Доставка курьером
                                    </div>
                                    <div class="col-3" v-if="res < 5000">400 &#8381;</div>
                                    <div class="col-3" v-else>Бесплатно</div>
                                </div>
                                <div class="row justify-content-between mt-4">
                                    <div class="col ml-4 pl-lg-4">
                                        <h5>Всего к оплате</h5>
                                    </div>

                                    <div class="col-3 font-weight-bold"> @{{ final }} &#8381;</div>
                                </div>
                                <div class="form-group m-4">
                                    <input
                                            type="submit"
                                            value="ОФОРМИТЬ ЗАКАЗ"
                                            class="order-btn btn btn-block btn-success p-3"/>
                                </div>
                            </section>
                        </div>
                    </div>
                </form>
            @else
                <div class="title pt-3 pb-3">
                    <div class="row">
                        <h3 class="col">Корзина</h3>
                    </div>
                    <div class="row pt-3">
                        <div class="col">
                            <h5>Корзина пуста</h5>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection

@section('script')
    <script>
        $('.plus').click(function () {
            $(this).prev().val(+$(this).prev().val() + 1);
        });
        $('.minus').click(function () {
            if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
        });
    </script>
    <script src="{{ asset('js/jquery_maskedinput_min.js') }}"></script>
    <script>
        $(function () {
            $('#phone').mask("8-999-999-99-99")
        })
    </script>
@endsection
