@extends('layout.template')

@section('title', 'Account Maintenance')

@section('content')

@if (session()->has('updtrl'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('updtrl')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (session()->has('DeleteUser'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('DeleteUser')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="d-flex flex-column align-items-center mb-3 gap-3">

    @foreach ($users as $user)
        <div class="mb-4" style="width:990px">
            <div class="row g-0 align-items-center justify-content-center shadow p-3" style="border-radius: 10px">
                <div class="col-md-2 ms-4">
                    <img src=" {{asset('/storage/users/'.$user->display_picture)}} " style="background-size: 100% 100%; border-radius: 20px; width: 100px; height: 100px;">
                </div>

            <div class="col-md-5">
                <div class="card-body">
                    <h3 class="card-title">{{$user->first_name}} {{$user->last_name}} - {{$user->role->role_name}}</h3>
                </div>
            </div>

            <div class="col-md-3">
                <form class="d-grid" action="{{ route('editRole', ['id'=>$user->id, 'locale' => session('locale')]) }}">
                    <button type="submit" class="btn btn-warning mt-1"> {{__('Update Role')}} </button>
                 </form>

                <form class="d-grid" action="{{ route('deleteUser', ['id'=>$user->id]) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger mt-1"> {{__('Delete')}} </button>
                 </form>
            </div>

            </div>
        </div>
      @endforeach
</div>

@endsection
