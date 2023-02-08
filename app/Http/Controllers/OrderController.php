<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function destroy($id){
        Order::destroy($id);
        return back()->with('SuccessDelete', __('Success Delete Item from Cart!'));
    }

    public function checkout(){
        $orders = Order::where('account_id', '=', auth()->user()->id)->get();

        if ($orders->isEmpty()) {
            // dd(session('locale'));
            return redirect()->route('home', ['locale' => session('locale')])
            ->with('InsertItem', __('Please Insert Item before Checkout').'!');
          }

        foreach($orders as $order){
            Order::destroy($order->id);
            Item::destroy($order->item->id);
        }
        return redirect(route('chkoutpg'));
    }

    public function chkout(){
        return view('HomePage.checkout');
    }
}
