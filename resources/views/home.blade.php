@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-3">
                <div class="col ps-4">
                    <!-- <h1 class="display-6 mb-3"><i class="ms-auto bi bi-grid"></i> {{ __('Dashboard') }}</h1> -->
                    <div class="row dashboard">
                        <div class="col">
                            <div class="card rounded-pill">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold"><i class="bi bi-person-lines-fill me-3"></i> Всего студентов</div>
                                        </div>
                                        <span class="badge bg-dark rounded-pill">{{$studentCount}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card rounded-pill">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold"><i class="bi bi-person-lines-fill me-3"></i> Всего учителей</div>
                                        </div>
                                        <span class="badge bg-dark rounded-pill">{{$teacherCount}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card rounded-pill">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold"><i class="bi bi-diagram-3 me-3"></i> Всего классов</div>
                                        </div>
                                        <span class="badge bg-dark rounded-pill">{{ $classCount }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col">
                            <div class="card rounded-pill">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Всего книг</div>
                                        </div>
                                        <span class="badge bg-dark rounded-pill">800</span>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    @if($studentCount > 0)
                    <div class="mt-3 d-flex align-items-center">
                        <div class="col-3">
                            <span class="ps-2 me-2">Students %</span>
                            <span class="badge rounded-pill border" style="background-color: #0678c8;">Мужской</span>
                            <span class="badge rounded-pill border" style="background-color: #49a4fe;">Женский</span>
                        </div>
                        @php
                        $maleStudentPercentage = round(($maleStudentsBySession/$studentCount), 2) * 100;
                        $maleStudentPercentageStyle = "style='background-color: #0678c8; width: $maleStudentPercentage%'";

                        $femaleStudentPercentage = round((($studentCount - $maleStudentsBySession)/$studentCount), 2) * 100;
                        $femaleStudentPercentageStyle = "style='background-color: #49a4fe; width: $femaleStudentPercentage%'";
                        @endphp
                        <div class="col-9 progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" {!!$maleStudentPercentageStyle!!} aria-valuenow="{{$maleStudentPercentage}}" aria-valuemin="0" aria-valuemax="100">{{$maleStudentPercentage}}%</div>
                            <div class="progress-bar progress-bar-striped" role="progressbar" {!!$femaleStudentPercentageStyle!!} aria-valuenow="{{$femaleStudentPercentage}}" aria-valuemin="0" aria-valuemax="100">{{$femaleStudentPercentage}}%</div>
                          </div>
                    </div>
                    @endif
                    <div class="row align-items-md-stretch mt-4">
                        <div class="col">
                            <div class="p-3 text-white bg-dark rounded-3">
                                <h3>Добро пожаловать в BYTE-MOBILE!</h3>
                                <p><i class="bi bi-emoji-heart-eyes"></i> Спасибо за вашу любовь и поддержку.</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-3 bg-white border rounded-3" style="height: 100%;">
                                <h3> Управление универом</h3>
                                <p class="text-end">сделано BYTE-MOBILE</i>.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-6">
                            <div class="card mb-3">
                                <div class="card-header bg-transparent"><i class="bi bi-calendar-event me-2"></i> События</div>
                                <div class="card-body text-dark">
                                    @include('components.events.event-calendar', ['editable' => 'false', 'selectable' => 'false'])
                                    {{-- <div class="overflow-auto" style="height: 250px;">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">Список группы</h5>
                                                <small>3 дня назад</small>
                                                </div>
                                                <p class="mb-1">Заполнить контент</p>
                                                <small>и малая печать</small>
                                            </a>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card mb-3">
                                <div class="card-header bg-transparent d-flex justify-content-between"><span><i class="bi bi-megaphone me-2"></i> Notices</span> {{ $notices->links() }}</div>
                                <div class="card-body p-0 text-dark">
                                    <div>
                                        @isset($notices)
                                        <div class="accordion accordion-flush" id="noticeAccordion">
                                            @foreach ($notices as $notice)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-heading{{$notice->id}}">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$notice->id}}" aria-expanded={{($loop->first)?"true":"false"}} aria-controls="flush-collapse{{$notice->id}}">
                                                        Published at: {{$notice->created_at}}
                                                    </button>
                                                </h2>
                                                <div id="flush-collapse{{$notice->id}}" class="accordion-collapse collapse {{($loop->first)?"show":"hide"}}" aria-labelledby="flush-heading{{$notice->id}}" data-bs-parent="#noticeAccordion">
                                                    <div class="accordion-body overflow-auto">{!!Purify::clean($notice->notice)!!}</div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endisset
                                            @if(count($notices) < 1)
                                                <div class="p-3">Нет умедовления</div>
                                            @endif
                                        </div>
                                    </div>
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
