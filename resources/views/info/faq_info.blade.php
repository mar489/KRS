@extends('layouts.header-footer')

@section('main')
    <div class="content-line my-5">
        <div class="container">
            <div class="container-2 col-lg-8 mx-auto">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h3>Вопросы и ответы</h3>
                        </div>
                    </div>
                </div>
                <div class="content-info">
                    <div class="accordion my-3" id="accordionExample">


                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed text-dark" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        <i class="fas fa-chevron-down mr-2"></i>
                                        Как оформить заказ?
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    Перед тем, как совершать покупки, необходимо зайти в каталог и выбрать понравившийся товар.
                                    Когда вы определились с выбором, поместите товар в корзину, нажав «В корзину» на его странице.
                                    Зайдите на в корзину , увеличьте или уменьшите количество выбранного товара, перйдите к форме оформления заказа.
                                    Укажите необходимые данные и отправьте заказ. К вам на указанную почту придёт код подтвержения. Введите его в соответствующее поле, подтвердив тем самым ваш заказ.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingFive">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed text-dark" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        <i class="fas fa-chevron-down mr-2"></i>
                                        Как продлить заказ?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                <div class="card-body">
                                    Продление срока хранения заказа временно невозможно.
                                    Вы можете обратиться по номеру горячей линии 8-800-123-45-67 или написать
                                    на электронный адрес prestige@gmail.com, чтобы изменить способ доставки заказа на более удобный.
                                    Подробнее о безопасных способах получения заказа.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed text-dark" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="fas fa-chevron-down mr-2"></i>
                                        Могу ли я разместить заказ по телефону?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    Особенность работы интернет-магазина заключается в том, что покупатель самостоятельно размещает заказ на сайте.
                                    Однако если Вы знаете точный артикул или модель необходимого Вам товара, наш оператор может принять Ваш заказ по телефону.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed text-dark" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="fas fa-chevron-down mr-2"></i>
                                        Могу ли я отказаться от заказанного товара?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    Согласно правилам дистанционной торговли Вы можете отказаться от заказанного товара в любой момент до
                                    получения товара и в течение 7 дней с момента его получения, однако в этом случае интернет-магазин имеет
                                    право взыскать с Вас сумму, затраченную на транспортировку товара и прочие связанные с этим расходы.
                                    Кроме того, в случае отказа от получения товара надлежащего качества, следующий Ваш заказ будет принят только
                                    при условии заключения договора купли-продажи и оплаты заказа.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed text-dark" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        <i class="fas fa-chevron-down mr-2"></i>
                                        Товар по той или иной причине не подошел, могу ли я его вернуть?

                                    </button>
                                </h5>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                <div class="card-body">
                                    В соответствии с Правилами дистанционной торговли Вы имеете право в течение 7 календарных дней с момента получения товара вернуть его без объяснения причин. В этом случае Вам будет полностью возвращена уплаченная Вами сумма.
                                    Возврат товара возможен при условии, что сохранен его товарный вид и потребительские свойства, при наличии полной заводской комплектации (включая упаковку) и документа, подтверждающего факт и условия покупки данного товара.
                                    В случае если товар поставлялся в рамках заключенного договора, предусматривавшего 10% залог, интернет-магазин имеет право в случае расторжения договора удержать залог.
                                    В соответствии с Правилами дистанционной торговли при возврате товара надлежащего качества интернет-магазин имеет право удержать сумму, равную затратам на доставку возвращаемого товара.
                                    Эти условия не распространяются на случаи возврата товаров ненадлежащего качества. В случае если товар неисправен, возврат денег производится в полном объеме.
                                    Для оформления возврата Вам необходимо обратиться по адресу: г.Томск, ул.Вершинина 43-В, т.: 56-15-56.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
