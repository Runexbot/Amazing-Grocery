@extends('layout.template')

@section('title', 'Login Page')

@section('content')

<h1 style="text-decoration: underline; margin-left: 150px; margin-bottom: 30px"><b>{{__('Login')}}</b></h1>

    @if (session()->has('SignUpSuccess'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('SignUpSuccess')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('SignInFailed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session('SignInFailed')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div style="margin-left: 150px; width: 21vw">
        <form action="{{ route('logintohome', ['locale' => session('locale')]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="d-flex flex-column">
                <div class="form-group">
                    <label for="">{{__('Email')}}:</label>
                    <input type="text" class="form-control" name="email">
                </div>
                <div class="form-group mt-2">
                    <label for="">{{__('Password')}}:</label>
                    <input type="password" class="form-control" name="password">
                </div>
            </div>
            <button type="submit" class="btn btn-warning text-black mt-3 mb-3">
                {{__('Submit')}}</button>
        </form>
        <a href="{{ route('register', ['locale' => session('locale')]) }}"> {{__('Dont have an account? Click here to Sign Up')}} </a>
    </div>

@endsection
