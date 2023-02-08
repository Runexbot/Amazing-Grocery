@extends('layout.template')

@section('title', 'Home Page')

@section('content')

@if (session()->has('InsertItem'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{session('InsertItem')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="d-flex flex-column align-items-center">
    <div class="container">
       <div class="d-flex flex-wrap gap-3">
          @foreach ($items as $item)
            <div class="d-flex flex-column h-100 align-items-center" style="width: 246px">
               <div style="height: 200px; width: 200px; border-radius: 50%;">
                  <img src="{{ asset($item->image) }}" style="background-size: 100% 100%; border-radius: 50%; width: 200px; height: 200px;" alt="">
               </div>
               {{-- {{dd($item)}} --}}
               <div class="card-body w-100 shadow d-flex justify-content-end flex-column">
                  <h5 class="card-title w-100 text-truncate">{{ $item->item_name }}</h5>
                  <h6 class="card-text"> Rp {{ number_format($item->price, 0, ',', '.') }} </h6>
                  <a href="{{ route('detail', ['id'=>$item->id, 'locale' => session('locale')]) }}" class="btn btn-primary">{{__('Detail')}}</a>
               </div>
            </div>
          @endforeach
       </div>
    </div>

    <div class="p-1" style="margin: 2rem">
       {{ $items->links() }}
    </div>
 </div>

@endsection
