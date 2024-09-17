@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3"><i class="bi bi-journal-medical"></i> Сменить пароль</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Сменить пароль</li>
                        </ol>
                    </nav>
                    @include('session-messages')
                    <div class="col-6 border p-3 shadow-sm">
                        <form action="{{route('password.update')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="old-password" class="form-label">Старый пароль</label>
                                <input class="form-control" id="old-password" name="old_password" type="password" placeholder="Старый пароль">
                            </div>
                            <div class="mb-3">
                                <label for="new-password" class="form-label">Новый пароль</label>
                                <input class="form-control" id="new-password" name="new_password" type="password" placeholder="Новый пароль">
                            </div>
                            <div class="mb-3">
                                <label for="new-password" class="form-label">Подтвердите новый пароль</label>
                                <input class="form-control" id="new-password" name="new_password_confirmation" type="password" placeholder="Подтвердите новый пароль">
                            </div>
                            <button type="submit" class="btn btn-outline-primary"><i class="bi bi-check2"></i> Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
</div>
@endsection