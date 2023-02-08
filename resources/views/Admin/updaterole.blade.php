@extends('layout.template')

@section('title', 'Update Role')

@section('content')

<div class="d-flex justify-content-center">
    <div class="d-flex justify-content-center align-items-center p-5 m-5 shadow" style="width: 900px">

        {{-- {{dd($user)}} --}}
        <div class="me-5">
            <img src=" {{asset('/storage/users/'.$user->display_picture)}} " style="background-size: 100% 100%; border-radius: 50%; width: 200px; height: 200px;" alt="">
        </div>

        <div class="d-flex flex-column">
            <form class="d-grid" action="{{ route('updateRole', ['id'=>$user->id]) }}" method="POST">
                @csrf
                @method('PATCH')
                <h2 class="card-title">{{$user->first_name}} {{$user->last_name}} - {{$user->email}} </h2>
                <label for="">{{__('Role')}}:</label>
                        <select name="role" id="">
                                <option value=" {{$user->role_id}} ">{{$user->role->role_name}} </option>
                            @if ($user->role_id === 1)
                                <option value="2">member</option>
                            @else
                                <option value="1">admin</option>
                            @endif
                        </select>
                        @error('role')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                <br>
                <button type="submit" class="btn btn-warning mt-1"> {{__('Save')}} </button>
        </div>
    </div>
</div>

@endsection
