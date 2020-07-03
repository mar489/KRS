<?php

namespace App\Http\Controllers;

use App\Delivery;
use App\Http\Requests\OrderStoreRequest;
use App\Order;
use App\OrderItems;
use App\Person;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function store(OrderStoreRequest $request)
    {

        //dd($request->all(), $_COOKIE['final']);
        if ($request -> pay === "1"){
            return redirect('/pay_page')->with(['request' => $request->all(), 'final' => $_COOKIE['final']]);
        }
        else{
            $person = Person::create([
                'surname' => $request->surname,
                'name' => $request -> name,
                'patronymic' => $request -> patronymic,
                'phone' => $request -> phone,
            ]);

            if ($request -> delivery === "1"){
                $delivery = Delivery::create([
                    'city' => $request -> city,
                    'street' => $request -> street,
                    'house' => $request -> house,
                    'apartment' => $request -> ap
                ]);
            }
            else{
                $delivery = Delivery::create([
                   'city' => $request -> city
                ]);
            }

            $order = Order::create([
                'person_id' => $person->id,
                'status_id' => 1,
                'delivery_id' => $delivery-> id,
                'comments' => $request -> comments,
                'price' => $_COOKIE['final']
            ]);

            $prodwithsize = [];
            foreach(json_decode($_COOKIE['avail_cart']) as $item){
                $product = Product::find($item->item_id);
                //$prodwithall[] = ['product' => $product, 'size' => $item -> size, 'count' => $item -> count];
                if($item -> size === '10') {
                    OrderItems::create([
                        'order_id' => $order -> id,
                        'product_id' => $product -> id,
                        'number' => $item->count,
                    ]);
                }
                else {
                    OrderItems::create([
                        'order_id' => $order -> id,
                        'product_id' => $product -> id,
                        'number' => $item->count,
                        'size_id' => $item -> size
                    ]);
                }
            }

            return redirect('/success')->with(['success' => 1]);
        }
    }

    public function online(Request $request)
    {
        $person = Person::create([
            'surname' => $request->surname,
            'name' => $request -> name,
            'patronymic' => $request -> patronymic,
            'phone' => $request -> phone,
        ]);

        if ($request -> delivery === "1"){
            $delivery = Delivery::create([
                'city' => $request -> city,
                'street' => $request -> street,
                'house' => $request -> house,
                'apartment' => $request -> ap
            ]);
        }
        else{
            $delivery = Delivery::create([
                'city' => $request -> city
            ]);
        }

        $order = Order::create([
            'person_id' => $person->id,
            'status_id' => 2,
            'delivery_id' => $delivery-> id,
            'comments' => $request -> comments,
            'price' => $_COOKIE['final']
        ]);

        $prodwithsize = [];
        foreach(json_decode($_COOKIE['avail_cart']) as $item){
            $product = Product::find($item->item_id);
            //$prodwithall[] = ['product' => $product, 'size' => $item -> size, 'count' => $item -> count];
            OrderItems::create([
                'order_id' => $order -> id,
                'product_id' => $product -> id,
                'number' => $item->count,
                'size_id' => $item -> size
            ]);
        }

        return redirect('/success')->with(['success' => 2]);
    }

    public function paypage()
    {
        if (Session::get('request')){
            return view('blank_pay', [
                'request' => Session::get('request'),
                'final' => Session::get('final')
            ]);
        }
        else return redirect('/');
    }

    public function success()
    {
        if(!empty(Session::get('success'))){
            return view('success');
        }
        else return redirect('/');
    }

    public function status(Request $request)
    {
        $id = array_key_last($request->all());
        $status = $request->all()[$id];

        $order = Order::find($id);
        $order->update([
            'status_id' => $status
        ]);

        return redirect()->back();
    }
}
