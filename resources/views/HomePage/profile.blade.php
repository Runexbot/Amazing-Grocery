@extends('layout.template')

@section('title', 'Profile Page')

@section('content')

<form action="{{ route('update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="d-flex flex-row align-items-center">
        <div style="width: 20vw; margin-left: 150px">
            <div class="form-group">
                <label for="">{{__('First Name')}}:</label>
                <input type="text" class="form-control" name="first_name" value="{{$profile->first_name}}">
                @error('first_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-2">
            <label for="">{{__('Email')}}:</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa-solid fa-envelope"></i></div>
                <input type="text" class="form-control" name="email" value="{{$profile->email}}">
            </div>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="form-group mt-2">
            <label for="">{{__('Gender')}}:</label>
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                @if ($profile->gender_id === 1)
                    <input type="radio" class="btn-check" name="gender" value="1" id="1" autocomplete="off" checked>
                    <label class="btn btn-outline-warning" for="1">{{__('Male')}}</label>

                    <input type="radio" class="btn-check" name="gender" value="2" id="2" autocomplete="off">
                    <label class="btn btn-outline-warning" for="2">{{__('Female')}}</label>

                    @else
                    <input type="radio" class="btn-check" name="gender" value="1" id="1" autocomplete="off">
                    <label class="btn btn-outline-warning" for="1">{{__('Male')}}</label>

                    <input type="radio" class="btn-check" name="gender" value="2" id="2" autocomplete="off" checked>
                    <label class="btn btn-outline-warning" for="2">{{__('Female')}}</label>
                @endif
              </div>
            @error('gender')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="form-group mt-2">
            <label for="">{{__('Password')}}:</label>
            <input type="password" class="form-control" name="password" id="">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
        </div>

        <div style="width: 20vw; margin-left: 150px">

            <div class="form-group">
            <label for="">{{__('Last Name')}}:</label>
            <input type="text" class="form-control" name="last_name" value="{{$profile->last_name}}">
            @error('last_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="mt-3">
            <label for="">{{__('Role')}}:</label>
                @if ($profile->role_id === 1)
                   <span style="font-size: 1em" class="badge bg-warning text-dark" value="1">{{__('Admin')}} </span>

                @else
                    <span style="font-size: 1em" class="badge bg-warning text-dark" value="2">{{__('User')}} </span>
                @endif
            </div>

            <div class="form-group mt-3">
            <label for="">{{__('Display Picture')}}:</label>
            <input type="file" class="form-control" id="display_picture" name="display_picture" onchange="preview()">
            @error('display_picture')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="form-group mt-3">
            <label for="">{{__('Confirm Password')}}:</label>
            <input type="password" class="form-control" name="confirm_password">
            @error('confirm_password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
        </div>

        <div style="width: 20vw; margin-left: 40px">
            <label for="show_image">
                {{-- {{dd($profile->display_picture)}} --}}
                <img src="{{ asset('/storage/users/'.$profile->display_picture) }}" width="200px" height="200px"
                  style="cursor: pointer; border-radius: 20px" id="show_image" onclick="openFile()">
              </label>
              @error('show_image')
                <div>
                  {{ $message }}
                </div>
              @enderror
        </div>

    </div>
    <button type="submit" class="btn btn-warning text-black mt-3 mb-3" style="margin-left: 150px; width: 120px">
        {{__('Save')}}</button>
</form>


@endsection

<script>
    function preview() {
        const url = URL.createObjectURL(event.target.files[0]);
        document.getElementById('show_image').src = url;
    }
    function openFile() {
        document.getElementById('display_picture').click();
    }
  </script>
