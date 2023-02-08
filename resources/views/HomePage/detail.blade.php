@extends('layout.template')

@section('title', 'Detail Page')

@section('content')

@if (session()->has('SuccessItem'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('SuccessItem')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('AlreadyinCart'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session('AlreadyinCart')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

<div class="d-flex justify-content-center align-items-center p-5 m-5">

    <div class="me-5">
        <img src=" {{$item->image}} " style="background-size: 100% 100%; border-radius: 50%; width: 400px; height: 400px;" alt="">
    </div>

     <div class="d-flex flex-column">
        <h1 class="card-title">{{$item->item_name}}</h1>
        <h3 class="card-text">Rp {{ number_format($item->price, 0, ',', '.') }} </h3>
        <br>
        <h5 class="card-text">{{__('Description')}}: </h5>
        <p class="card-text">{{$item->item_desc}}</p>
        <a href="{{ route('buy', ['id'=>$item->id, 'locale' => session('locale')]) }}" class="btn btn-warning">{{__('Buy')}}</a>
    </div>

</div>

@endsection
