@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-calendar2-week-fill"></i> Просмотр посещаемости
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{url()->previous()}}">Курсы</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Просмотр посещаемости</li>
                        </ol>
                    </nav>
                    @if(request()->query('course_name'))
                        <h3><i class="bi bi-compass"></i> Курсы: {{request()->query('course_name')}} </h3>
                    @elseif(request()->query('section_name'))
                        <h3><i class="bi bi-diagram-2"></i> Раздел: {{request()->query('section_name')}} </h3>
                    @endif
                    <div class="mt-4">Текущая дата и время: {{ date('Y-m-d H:i:s') }}</div>
                    <div class="row mt-4">
                        <div class="col bg-white border shadow-sm pt-2">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Имя студента</th>
                                        <th scope="col">Сегоднящний статус</th>
                                        <th scope="col">Общая посещаемость</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attendances as $attendance)
                                        @php
                                            $total_attended = \App\Models\Attendance::where('student_id', $attendance->student_id)->where('session_id', $attendance->session_id)->count();
                                        @endphp
                                        <tr>
                                            <td>{{$attendance->student->first_name}} {{$attendance->student->last_name}}</td>
                                            <td>
                                                @if ($attendance->status == "on")
                                                    <span class="badge bg-success">НЫНЕШНИЙ</span>
                                                @else
                                                    <span class="badge bg-danger">ОТСУТСТВУЮЩИЙ</span>
                                                @endif
                                                
                                            </td>
                                            <td>{{$total_attended}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
</div>
@endsection
