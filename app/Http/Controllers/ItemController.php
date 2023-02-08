<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index(){

        $items = Item::paginate(10);

        return view('HomePage.index', compact('items'));
    }

    public function detail($locale, $id){
        $item = Item::find($id);
        // dd($id);
        return view('HomePage.detail', compact('item'));
    }

    public function addToCart($locale, $id){
        $item = Item::find($id);

        $order = Order::firstOrCreate([
            'account_id' => auth()->user()->id,
            'item_id' => $id,

        ],[
            'price' => $item->price
        ]);

        // dd($order->wasRecentlyCreated);
        if($order->wasRecentlyCreated == 'true'){
            return back()->with('SuccessItem', __('Successfully add Item to the Cart'));
        }else{
            return back()->with('AlreadyinCart', __('Item Already in the Cart'));
        }
    }

    public function cart(){

        $orders = Auth::user()->orders;

        // dd($orders);

        $totalPrice = 0;

        foreach($orders as $order){
            $totalPrice += $order->price;
        }

        return view('HomePage.cart', compact('orders', 'totalPrice'));
    }
}
