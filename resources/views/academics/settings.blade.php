@extends('layouts.app')

@section('content')
<script src="{{ asset('js/masonry.pkgd.min.js') }}"></script>
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-tools"></i>Академические Настройки
                    </h1>

                    @include('session-messages')

                    <div class="mb-4">
                        <div class="row" data-masonry='{"percentPosition": true }'>
                            @if ($latest_school_session_id == $current_school_session_id)
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>Создать сессию</h6>
                                    <p class="text-danger">
                                        <small><i class="bi bi-exclamation-diamond-fill me-2"></i>Создать одну сессию на академический год. Последняя созданная сессия будет считаться последней академической сессией.</small>
                                    </p>
                                    <form action="{{route('school.session.store')}}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="2021 - 2022" aria-label="Current Session" name="session_name" required>
                                        </div>
                                        <button class="btn btn-sm btn-outline-primary" type="submit"><i class="bi bi-check2"></i>Создать</button>
                                    </form>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>Обзор Сессии</h6>
                                    <p class="text-danger">
                                        <small><i class="bi bi-exclamation-diamond-fill me-2"></i>Используйте это только когда, когда вы хотите просмотреть данные из предедущих сеансов.</small>
                                    </p>
                                    <form action="{{route('school.session.browse')}}" method="POST">
                                        @csrf
                                    <div class="mb-3">
                                        <p class="mt-2">Выберите "Сеанс" для просмотра:</p>
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm" name="session_id" required>
                                            @isset($school_sessions)
                                                @foreach ($school_sessions as $school_session)
                                                    <option value="{{$school_session->id}}">{{$school_session->session_name}}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                    <button class="btn btn-sm btn-outline-primary" type="submit"><i class="bi bi-check2"></i>Набор</button>
                                    </form>
                                </div>
                            </div>
                            @if ($latest_school_session_id == $current_school_session_id)
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>Создать семестр для текущей сессии</h6>
                                    <form action="{{route('school.semester.create')}}" method="POST">
                                        @csrf
                                    <input type="hidden" name="session_id" value="{{$current_school_session_id}}">
                                    <div class="mt-2">
                                        <p>Имя Семестра<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                        <input type="text" class="form-control form-control-sm" placeholder="Первый семестр" aria-label="Semester name" name="semester_name" required>
                                    </div>
                                    <div class="mt-2">
                                        <label for="inputStarts" class="form-label">Начало<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                        <input type="date" class="form-control form-control-sm" id="inputStarts" placeholder="Starts" name="start_date" required>
                                    </div>
                                    <div class="mt-2">
                                        <label for="inputEnds" class="form-label">Конец<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                        <input type="date" class="form-control form-control-sm" id="inputEnds" placeholder="Ends" name="end_date" required>
                                    </div>
                                    <button type="submit" class="mt-3 btn btn-sm btn-outline-primary"><i class="bi bi-check2"></i>Создать</button>
                                </form>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>Тип посещаемости</h6>
                                    <p class="text-danger">
                                        <small><i class="bi bi-exclamation-diamond-fill me-2"></i> Не меняйте тип в середине семестра.</small>
                                    </p>
                                    <form action="{{route('school.attendance.type.update')}}" method="POST">
                                        @csrf
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="attendance_type" id="attendance_type_section" {{($academic_setting->attendance_type == 'section')?'checked="checked"':null}} value="section">
                                            <label class="form-check-label" for="attendance_type_section">
                                                Посещаемость по секциям
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="attendance_type" id="attendance_type_course" {{($academic_setting->attendance_type == 'course')?'checked="checked"':null}} value="course">
                                            <label class="form-check-label" for="attendance_type_course">
                                                Посещаемость по курсу
                                            </label>
                                        </div>

                                        <button type="submit" class="mt-3 btn btn-sm btn-outline-primary"><i class="bi bi-check2"></i> Сохранить</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>Создать группу</h6>
                                    <form action="{{route('school.class.create')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="session_id" value="{{$current_school_session_id}}">
                                        <div class="mb-3">
                                            <input type="text" class="form-control form-control-sm" name="class_name" placeholder="Имя группы" aria-label="Class name" required>
                                        </div>
                                        <button class="btn btn-sm btn-outline-primary" type="submit"><i class="bi bi-check2"></i> Создать</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                <h6>Создать секцию</h6>
                                    <form action="{{route('school.section.create')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="session_id" value="{{$current_school_session_id}}">
                                        <div class="mb-3">
                                            <input class="form-control form-control-sm" name="section_name" type="text" placeholder="Имя секции" required>
                                        </div>
                                        <div class="mb-3">
                                            <input class="form-control form-control-sm" name="room_no" type="text" placeholder="Нет комнаты." required>
                                        </div>
                                        <div>
                                            <p>Назначить раздел классу:</p>
                                            <select class="form-select form-select-sm" aria-label=".form-select-sm" name="class_id" required>
                                                @isset($school_classes)
                                                    @foreach ($school_classes as $school_class)
                                                    <option value="{{$school_class->id}}">{{$school_class->class_name}}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                        <button type="submit" class="mt-3 btn btn-sm btn-outline-primary"><i class="bi bi-check2"></i> Сохранить</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>Создать Курс</h6>
                                    <form action="{{route('school.course.create')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="session_id" value="{{$current_school_session_id}}">
                                        <div class="mb-1">
                                            <input type="text" class="form-control form-control-sm" name="course_name" placeholder="Название курса" aria-label="Course name" required>
                                        </div>
                                        <div class="mb-3">
                                            <p class="mt-2">Тип курса:<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select class="form-select form-select-sm" name="course_type" aria-label=".form-select-sm" required>
                                                <option value="Core">Основной</option>
                                                <option value="General">Общий</option>
                                                <option value="Elective">Факультативный</option>
                                                <option value="Optional">Обции</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <p>Назначить на семестр:<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select class="form-select form-select-sm" aria-label=".form-select-sm" name="semester_id" required>
                                                @isset($semesters)
                                                    @foreach ($semesters as $semester)
                                                    <option value="{{$semester->id}}">{{$semester->semester_name}}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <p>Назначить группу:<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select class="form-select form-select-sm" aria-label=".form-select-sm" name="class_id" required>
                                                @isset($school_classes)
                                                    @foreach ($school_classes as $school_class)
                                                    <option value="{{$school_class->id}}">{{$school_class->class_name}}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                        <button class="btn btn-sm btn-outline-primary" type="submit"><i class="bi bi-check2"></i> Создать</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>Назначить Учителя</h6>
                                    <form action="{{route('school.teacher.assign')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="session_id" value="{{$current_school_session_id}}">
                                        <div class="mb-3">
                                            <p class="mt-2">Выбор Учителя:<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select class="form-select form-select-sm" aria-label=".form-select-sm" name="teacher_id" required>
                                                @isset($teachers)
                                                    @foreach ($teachers as $teacher)
                                                    <option value="{{$teacher->id}}">{{$teacher->first_name}} {{$teacher->last_name}}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <p>Назначить на семестр:<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select class="form-select form-select-sm" aria-label=".form-select-sm" name="semester_id" required>
                                                @isset($semesters)
                                                    @foreach ($semesters as $semester)
                                                    <option value="{{$semester->id}}">{{$semester->semester_name}}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                        <div>
                                            <p>Назначить группу:<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select onchange="getSectionsAndCourses(this);" class="form-select form-select-sm" aria-label=".form-select-sm" name="class_id" required>
                                                @isset($school_classes)
                                                    <option selected disabled> Пожалуйста выберите группу</option>
                                                    @foreach ($school_classes as $school_class)
                                                    <option value="{{$school_class->id}}">{{$school_class->class_name}}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                        <div>
                                            <p class="mt-2">Назначить секцию:<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select class="form-select form-select-sm" id="section-select" aria-label=".form-select-sm" name="section_id" required>
                                            </select>
                                        </div>
                                        <div>
                                            <p class="mt-2">Назначить курс:<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select class="form-select form-select-sm" id="course-select" aria-label=".form-select-sm" name="course_id" required>
                                            </select>
                                        </div>
                                        <button type="submit" class="mt-3 btn btn-sm btn-outline-primary"><i class="bi bi-check2"></i> Сохранить</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>Разрешить подачу окончательных оценок</h6>
                                    <form action="{{route('school.final.marks.submission.status.update')}}" method="POST">
                                        @csrf
                                        <p class="text-danger">
                                            <small><i class="bi bi-exclamation-diamond-fill me-2"></i> Обычно учителям разрешается высставлять итоговые оценки непосредственно перед окончанием "Семестра".</small>
                                        </p>
                                        <p class="text-primary">
                                            <small><i class="bi bi-exclamation-diamond-fill me-2"></i> Запретить в начале "Семестра".</small>
                                        </p>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="marks_submission_status" id="marks_submission_status_check" {{($academic_setting->marks_submission_status == 'on')?'checked="checked"':null}}>
                                            <label class="form-check-label" for="marks_submission_status_check">{{($academic_setting->marks_submission_status == 'on')?'Allowed':'Disallowed'}}</label>
                                        </div>
                                        <button type="submit" class="mt-3 btn btn-sm btn-outline-primary"><i class="bi bi-check2"></i> Сохранить</button>
                                    </form>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
</div>
<script>
    function getSectionsAndCourses(obj) {
        var class_id = obj.options[obj.selectedIndex].value;

        var url = "{{route('get.sections.courses.by.classId')}}?class_id=" + class_id 

        fetch(url)
        .then((resp) => resp.json())
        .then(function(data) {
            var sectionSelect = document.getElementById('section-select');
            sectionSelect.options.length = 0;
            data.sections.unshift({'id': 0,'section_name': 'Пожалуйства выберите секцию'})
            data.sections.forEach(function(section, key) {
                sectionSelect[key] = new Option(section.section_name, section.id);
            });

            var courseSelect = document.getElementById('course-select');
            courseSelect.options.length = 0;
            data.courses.unshift({'id': 0,'course_name': 'Пожалуйста выберите курс'})
            data.courses.forEach(function(course, key) {
                courseSelect[key] = new Option(course.course_name, course.id);
            });
        })
        .catch(function(error) {
            console.log(error);
        });
    }
</script>
@endsection
