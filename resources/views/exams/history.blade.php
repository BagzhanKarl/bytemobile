@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3"><i class="bi bi-distribute-vertical"></i> История экзамена</h1>
                    <div class="row">
                        <div class="col-12">
                            <div class="card border-dark my-3">
                                <div class="card-header bg-transparent border-dark">
                                    <i class="bi bi-diagram-2"></i> Первая группа
                                </div>
                                <div class="card-body text-dark">
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                    Секция #1
                                                </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div class="mb-4">
                                                        <!-- timeline item 1 -->
                                                        <div class="row">
                                                            <!-- timeline item 1 left dot -->
                                                            <div class="col-auto text-center flex-column d-none d-sm-flex">
                                                                <div class="row h-50">
                                                                    <div class="col">&nbsp;</div>
                                                                    <div class="col">&nbsp;</div>
                                                                </div>
                                                                <h5 class="m-2">
                                                                    <span class="badge rounded-pill bg-light border">&nbsp;</span>
                                                                </h5>
                                                                <div class="row h-50">
                                                                    <div class="col border-end">&nbsp;</div>
                                                                    <div class="col">&nbsp;</div>
                                                                </div>
                                                            </div>
                                                            <!-- timeline item 1 event content -->
                                                            <div class="col py-2">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col fs-4">Quiz 1</div>
                                                                        <div class="col text-end">Девятое января 2024 9:00 </div>
                                                                    </div>
                                                                    <div class="row text-muted">
                                                                        <div class="col">Принодлежит: первому семестору</div>
                                                                        <div class="col text-end">Начало: Девятое января 2024 - Конец: пятнадцатое января 2024</div>
                                                                    </div>
                                                                
                                                                <p class="card-text">
                                                                    <span class="badge bg-secondary">Курс: математика</span>
                                                                    <span class="badge bg-dark">: 100</span>
                                                                    <span class="badge bg-primary">Категория: Quiz</span>
                                                                </p>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <!--/row-->
                                                        <!-- timeline item 2 -->
                                                        <div class="row">
                                                            <div class="col-auto text-center flex-column d-none d-sm-flex">
                                                            <div class="row h-50">
                                                                <div class="col border-end">&nbsp;</div>
                                                                <div class="col">&nbsp;</div>
                                                            </div>
                                                            <h5 class="m-2">
                                                                <span class="badge rounded-pill bg-light border">&nbsp;</span>
                                                            </h5>
                                                            <div class="row h-50">
                                                                <div class="col border-end">&nbsp;</div>
                                                                <div class="col">&nbsp;</div>
                                                            </div>
                                                            </div>
                                                            <div class="col py-2">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                <div class="float-right">Вторник, десятое января 2014 8:30 </div>
                                                                <h4 class="card-title">Второй день сессии</h4>
                                                                <p class="card-text">Запишитесь на курсы и выступления, соответствующие программе вашего курса, познакомътесь с преподователями.</p>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <!--/row-->
                                                        <!-- timeline item 3 -->
                                                        <div class="row">
                                                            <!-- timeline item 1 left dot -->
                                                            <div class="col-auto text-center flex-column d-none d-sm-flex">
                                                                <div class="row h-50">
                                                                    <div class="col border-end">&nbsp;</div>
                                                                    <div class="col">&nbsp;</div>
                                                                </div>
                                                                <h5 class="m-2">
                                                                    <span class="badge rounded-pill bg-light border">&nbsp;</span>
                                                                </h5>
                                                                <div class="row h-50">
                                                                    <div class="col border-end">&nbsp;</div>
                                                                    <div class="col">&nbsp;</div>
                                                                </div>
                                                            </div>
                                                            <!-- timeline item 1 event content -->
                                                            <div class="col py-2">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                <div class="float-right text-muted">Понедельник, девятое января 2024 7:00</div>
                                                                <h4 class="card-title">Первый ориентационный день</h4>
                                                                <p class="card-text">Введние и начало экскурсии.</p>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <!--/row-->
                                                    </div>
                                                    <!--container-->
                                                </div>
                                            </div>
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
