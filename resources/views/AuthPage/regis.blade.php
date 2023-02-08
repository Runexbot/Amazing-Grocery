@extends('layout.template')

@section('title', 'Register Page')

@section('content')

    <h1 style="text-decoration: underline; margin-left: 150px; margin-bottom: 30px"><b>{{__('Register')}}</b></h1>

    <form action="{{ route('registodb') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="d-flex flex-row align-items-center">
            <div style="width: 20vw; margin-left: 150px">
                <div class="form-group">
                    <label for="">{{__('First Name')}}:</label>
                    <input type="text" class="form-control" name="first_name" value="{{old('first_name')}}">
                    @error('first_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-2">
                <label for="">{{__('Email')}}:</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa-solid fa-envelope"></i></div>
                    <input type="text" class="form-control" name="email" value="{{old('email')}}">
                </div>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>

                <div class="form-group mt-2">
                <label for="">{{__('Gender')}}:</label>
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="gender" value="1" id="1" autocomplete="off">
                    <label class="btn btn-outline-warning" for="1">{{__('Male')}}</label>

                    <input type="radio" class="btn-check" name="gender" value="2" id="2" autocomplete="off">
                    <label class="btn btn-outline-warning" for="2">{{__('Female')}}</label>
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
                <input type="text" class="form-control" name="last_name" value="{{old('last_name')}}">
                @error('last_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>

                <div class="form-group mt-3">
                <label for="">{{__('Role')}}:</label>
                <select name="role" id="">
                        <option value="">{{__('Select Your Roles')}} </option>
                    @foreach ($roles as $role)
                        <option value="{{$role->id}}">{{$role->role_name}}</option>
                    @endforeach
                </select>
                @error('role')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
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
                    <img src="{{ asset('images/placeholder.png') }}" width="200px" height="200px"
                      style="cursor: pointer;" id="show_image" onclick="openFile()">
                  </label>
                  @error('show_image')
                    <div>
                      {{ $message }}
                    </div>
                  @enderror
            </div>

        </div>
        <button type="submit" class="btn btn-warning text-black mt-3 mb-3" style="margin-left: 150px">
            {{__('Submit')}}</button>
    </form>

    <a style="margin-left: 150px;" href="{{ route('login', ['locale' => session('locale')]) }}"> {{__('Already have an account? Click here to Log In')}} </a>

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
