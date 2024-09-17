@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3"><i class="bi bi-journal-medical"></i> Редактировать курсы</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{url()->previous()}}">Курсы</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Редактировать курсы</li>
                        </ol>
                    </nav>
                    @include('session-messages')
                    <div class="row">
                        <form class="col-6" action="{{route('school.course.update')}}" method="POST">
                            @csrf
                            <input type="hidden" name="session_id" value="{{$current_school_session_id}}">
                            <input type="hidden" name="course_id" value="{{$course_id}}">
                            <div class="mb-3">
                                <label for="course_name" class="form-label">Имя курса</label>
                                <input class="form-control" id="course_name" name="course_name" type="text" value="{{$course->course_name}}">
                            </div>
                            <div class="mb-3">
                                <label for="course_type" class="form-label">Тип курса</label>
                                <select class="form-select" id="course_type" name="course_type" aria-label="Course type">
                                    <option value="Core" {{($course->course_type == 'Core')? 'selected' : ''}}>Основной</option>
                                    <option value="General" {{($course->course_type == 'General')? 'selected' : ''}}>Общий</option>
                                    <option value="Elective" {{($course->course_type == 'Elective')? 'selected' : ''}}>Факультативный</option>
                                    <option value="Optional" {{($course->course_type == 'Optional')? 'selected' : ''}}>Обции</option>
                                </select>
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