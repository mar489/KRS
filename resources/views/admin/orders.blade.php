@extends('layouts.admin-menu')

@section('content')
    <!--orders-->
    <div class="container" id="main">
        <div class="orders mt-lg-4 mt-md-3 mt-sm-2">
            <table class="table">
                <thead>
                <tr>
                    <th>Номер заказа</th>
                    <th>Наименование товара</th>
                    <th>Количество</th>
                    <th>Цена</th>
                    <th>Статус</th>
                    <th>Последнее изменение</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>
                            @foreach($order->items as $item)
                                {{$item->product_name}}@if($item->size_id !== null) ({{$item->size->size}})@endif<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach($order->items as $item)
                                {{$item->number}}<br>
                            @endforeach
                        </td>
                        <td>
                            {{$order->price}}
                        </td>
                        <td>
                            <form method="post" ref="form{{$order->id}}" action="/order/change" v-on:change="formSubmit()">
                                @csrf
                                @if($order->status->status_name === "Завершён")
                                    <span class="text-success">{{$order->status->status_name}}</span>
                                @elseif($order->status->status_name === 'Отклонён')
                                    <span class="text-danger">{{$order->status->status_name}}</span>
                                @else
                                    <select name="{{$order -> id}}">
                                        @foreach($statuses as $status)
                                            <option value="{{$status->id}}" @if($status->id === $order->status_id) selected @endif>{{$status->status_name}}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </form>
                        </td>
                        <td>
                            {{$order->updated_at}}
                        </td>
                    </tr>
                @endforeach

