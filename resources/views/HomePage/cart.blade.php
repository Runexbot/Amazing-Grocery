@extends('layout.template')

@section('title', 'Cart Page')

@section('content')

@if (session()->has('SuccessDelete'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('SuccessDelete')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('InsertItem'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{session('InsertItem')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<h1 style="text-decoration: underline; margin-left: 150px; margin-bottom: 30px"><b>{{__('Cart')}}</b></h1>

<div class="d-flex flex-column align-items-center mb-3 gap-4">

    @foreach ($orders as $order)
        <div class="mb-3" style="width:990px">
            <div class="row g-0 align-items-center">
                <div class="col-md-3">
                    <img src=" {{$order->item->image}} " style="background-size: 100% 100%; border-radius: 50%; width: 200px; height: 200px;">
                </div>

            <div class="col-md-3">
                <div class="card-body">
                    <h2 class="card-title">{{$order->item->item_name}}</h2>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-body">
                    <h4 class="card-text">Rp {{ number_format($order->price, 0, ',', '.') }}</h4>
                </div>
            </div>

            <div class="col-md-3">
                <form class="d-grid" action="{{ route('deleteitem', ['id'=>$order->id]) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-warning mt-1"> {{__('Delete')}} </button>
                 </form>
            </div>

            </div>
        </div>
      @endforeach

      <div class="d-flex justify-content-end p-5 gap-3" style="margin-left: 600px">
        <h3>{{__('Total Price')}}: Rp. {{ number_format($totalPrice, 0, ',', '.') }}</h3>
        <form action="{{ route('checkout') }}" method="POST" class="ms-1">
           @csrf
           <button class="btn btn-warning"> {{__('Checkout')}} </button>
        </form>
     </div>
</div>

@endsection
