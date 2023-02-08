@extends('layout.circle')

@section('title', 'Success Checkout')

@section('circle_input')

    <div class="d-flex flex-column align-items-center">
        <h2>{{__('Success')}}!</h2>

        <h5>{{__('We will contact you 1x24 hours')}}.</h5>
        <a href="{{ route('home', ['locale' => session('locale')]) }}">{{__('Click here to back Home')}}</a>
    </div>

@endsection
