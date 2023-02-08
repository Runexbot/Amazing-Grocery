@extends('layout.template')

@section('content')

    <div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
        <div style="border: 5px solid yellow; border-radius: 50%; width: 450px; height: 450px; display: flex; flex-direction: column; justify-content: center; align-items:center">
            @yield('circle_input')
        </div>
    </div>

@endsection
