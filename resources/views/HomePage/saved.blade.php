@extends('layout.circle')

@section('title', 'Success Update Profile')

@section('circle_input')

<div class="">
    <h1> {{__('Saved')}}! </h1>
</div>
<a href="{{route('home', ['locale' => session('locale')])}}"> {{__('Click here to back Home')}}  </a>

@endsection
