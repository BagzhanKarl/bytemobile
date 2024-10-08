@extends('layouts.app')

@section('content')
<style>
/* .table th:first-child,
.table td:first-child {
  position: relative;
  background-color: #f8f9fa;
} */
</style>
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-person-lines-fill"></i> Студент
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                          <li class="breadcrumb-item"><a href="{{route('student.list.show')}}">Список студента</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Профиль</li>
                        </ol>
                    </nav>
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-sm-4 col-md-3">
                                <div class="card bg-light">
                                    <div class="px-5 pt-2">
                                        @if (isset($student->photo))
                                            <img src="{{asset('/storage'.$student->photo)}}" class="rounded-3 card-img-top" alt="Profile photo">
                                        @else
                                            <img src="{{asset('imgs/profile.png')}}" class="rounded-3 card-img-top" alt="Profile photo">
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{$student->first_name}} {{$student->last_name}}</h5>
                                        <p class="card-text">#ID: {{$promotion_info->id_card_number}}</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Пол: {{$student->gender}}</li>
                                        <li class="list-group-item">Телефон: {{$student->phone}}</li>
                                        {{-- <li class="list-group-item"><a href="#">Просмотреть баллы &amp; Результат</a></li> --}}
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-8 col-md-9">
                                <div class="p-3 mb-3 border rounded bg-white">
                                    <h6>Student Information</h6>
                                    <table class="table table-responsive mt-3">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Имя:</th>
                                                <td>{{$student->first_name}}</td>
                                                <th>Фамилия:</th>
                                                <td>{{$student->last_name}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Email:</th>
                                                <td>{{$student->email}}</td>
                                                <th>День рождения:</th>
                                                <td>{{$student->birthday}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Национальность:</th>
                                                <td>{{$student->nationality}}</td>
                                                <th>Религия:</th>
                                                <td>{{$student->religion}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Адрес:</th>
                                                <td>{{$student->address}}</td>
                                                <th>Воторой Адрес:</th>
                                                <td>{{$student->address2}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Город:</th>
                                                <td>{{$student->city}}</td>
                                                <th>Почтовый индекс:</th>
                                                <td>{{$student->zip}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Группа крови:</th>
                                                <td>{{$student->blood_type}}</td>
                                                <th>Телефон:</th>
                                                <td>{{$student->phone}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Пол:</th>
                                                <td colspan="3">{{$student->gender}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="p-3 mb-3 border rounded bg-white">
                                    <h6>Информация про родителей</h6>
                                    <table class="table table-responsive mt-3">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Имя отца:</th>
                                                <td>{{$student->parent_info->father_name}}</td>
                                                <th>Имя матери:</th>
                                                <td>{{$student->parent_info->mother_name}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Номер отца:</th>
                                                <td>{{$student->parent_info->father_phone}}</td>
                                                <th>Номер матери:</th>
                                                <td>{{$student->parent_info->mother_phone}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Адрес:</th>
                                                <td colspan="3">{{$student->parent_info->parent_address}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="p-3 mb-3 border rounded bg-white">
                                    <h6>Академический Информация</h6>
                                    <table class="table table-responsive mt-3">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Группа:</th>
                                                <td>{{$promotion_info->section->schoolClass->class_name}}</td>
                                                <th>Номер регистрационной доски:</th>
                                                <td>{{$student->academic_info->board_reg_no}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Секция:</th>
                                                <td colspan="3">{{$promotion_info->section->section_name}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
</div>
@endsection
