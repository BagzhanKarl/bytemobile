@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-person-lines-fill"></i> Редактировать студента
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{url()->previous()}}">Список студента</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Редактировать студента</li>
                        </ol>
                    </nav>

                    @include('session-messages')
                    <div class="mb-4">
                        <form class="row g-3" action="{{route('school.student.update')}}" method="POST">
                            @csrf
                            <input type="hidden" name="student_id" value="{{$student->id}}">
                            <div class="row g-3">
                                <div class="col-3">
                                    <label for="inputFirstName" class="form-label">Имя<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputFirstName" name="first_name" placeholder="Имя" required value="{{$student->first_name}}">
                                </div>
                                <div class="col-3">
                                    <label for="inputLastName" class="form-label">Фамилия<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputLastName" name="last_name" placeholder="Фамилия" required value="{{$student->last_name}}">
                                </div>
                                <div class="col-3">
                                    <label for="inputEmail4" class="form-label">Email<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="email" class="form-control" id="inputEmail4" name="email" required value="{{$student->email}}">
                                </div>
                                <div class="col-3">
                                    <label for="inputBirthday" class="form-label">День рождения<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="date" class="form-control" id="inputBirthday" name="birthday" placeholder="День рождения" required value="{{$student->birthday}}">
                                </div>
                                <div class="col-3">
                                    <label for="inputAddress" class="form-label">Адрес<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Алматы шашкина 14" required value="{{$student->address}}">
                                </div>
                                <div class="col-3">
                                    <label for="inputAddress2" class="form-label">Воторой адрес</label>
                                    <input type="text" class="form-control" id="inputAddress2" name="address2" placeholder="Квартира, студия или этаж" value="{{$student->address2}}">
                                </div>
                                <div class="col-2">
                                    <label for="inputCity" class="form-label">Город<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputCity" name="city" placeholder="Алматы..." required value="{{$student->city}}">
                                </div>
                                <div class="col-2">
                                    <label for="inputZip" class="form-label">Почтовый индекс<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputZip" name="zip" required value="{{$student->zip}}">
                                </div>
                                <div class="col-2">
                                    <label for="inputState" class="form-label">Пол<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <select id="inputState" class="form-select" name="gender" required>
                                        <option value="Male" {{($student->gender == 'Male')?'selected':null}}>Мужской</option>
                                        <option value="Female" {{($student->gender == 'Female')?'selected':null}}>Женский</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="inputNationality" class="form-label">Национальность<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputNationality" name="nationality" placeholder="e.g. Казах..." required value="{{$student->nationality}}">
                                </div>
                                <div class="col-2">
                                    <label for="inputBloodType" class="form-label">Группа крови<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <select id="inputBloodType" class="form-select" name="blood_type" required>
                                        <option value="A+" {{($student->blood_type == 'A+')?'selected':null}}>Первый положительный</option>
                                        <option value="A-" {{($student->blood_type == 'A-')?'selected':null}}>Первая отрицательная</option>
                                        <option value="B+" {{($student->blood_type == 'B+')?'selected':null}}>Вторая положительная</option>
                                        <option value="B-" {{($student->blood_type == 'B-')?'selected':null}}>Вторая отрицательная</option>
                                        <option value="O+" {{($student->blood_type == 'O+')?'selected':null}}>Третья положительная</option>
                                        <option value="O-" {{($student->blood_type == 'O-')?'selected':null}}>Третья отрицательная</option>
                                        <option value="AB+" {{($student->blood_type == 'AB+')?'selected':null}}>Четвертая положительная</option>
                                        <option value="AB-" {{($student->blood_type == 'AB-')?'selected':null}}>Четвертая отрицательная</option>
                                        <option value="Other" {{($student->blood_type == 'Other')?'selected':null}}>Другие</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="inputReligion" class="form-label">Религия<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <select id="inputReligion" class="form-select" name="religion" required>
                                        <option {{($student->religion == 'Islam')?'selected':null}}>Ислам</option>
                                        <option {{($student->religion == 'Hinduism')?'selected':null}}>Индуизм</option>
                                        <option {{($student->religion == 'Christianity')?'selected':null}}>Христъянство</option>
                                        <option {{($student->religion == 'Buddhism')?'selected':null}}>Будизм</option>
                                        <option {{($student->religion == 'Judaism')?'selected':null}}>Удаизм</option>
                                        <option {{($student->religion == 'Other')?'selected':null}}>Другие</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label for="inputPhone" class="form-label">Телефон<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputPhone" name="phone" placeholder="+7 700......" required value="{{$student->phone}}">
                                </div>
                                <div class="col-3">
                                    <label for="inputIdCardNumber" class="form-label">Id карты<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputIdCardNumber" name="id_card_number" placeholder="e.g. 2024-03-01-02-01 (Год Семестр Группа Секция список)" required value="{{$promotion_info->id_card_number}}">
                                </div>
                            </div>
                            <div class="row mt-4 g-3">
                                <h6>Информация про родителей</h6>
                                <div class="col-3">
                                    <label for="inputFatherName" class="form-label">Имя отца<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputFatherName" name="father_name" placeholder="Имя отца" required value="{{$parent_info->father_name}}">
                                </div>
                                <div class="col-3">
                                    <label for="inputFatherPhone" class="form-label">Номер отца<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputFatherPhone" name="father_phone" placeholder="+7 700......" required value="{{$parent_info->father_phone}}">
                                </div>
                                <div class="col-3">
                                    <label for="inputMotherName" class="form-label">Имя матери<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputMotherName" name="mother_name" placeholder="Имя матери" required value="{{$parent_info->mother_name}}">
                                </div>
                                <div class="col-3">
                                    <label for="inputMotherPhone" class="form-label">Номер матери<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputMotherPhone" name="mother_phone" placeholder="+7 700......" required value="{{$parent_info->mother_phone}}">
                                </div>
                                <div class="col-4">
                                    <label for="inputParentAddress" class="form-label">Адрес<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputParentAddress" name="parent_address" placeholder="Алматы шашкина 14" required value="{{$parent_info->parent_address}}">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-sm btn-outline-primary"><i class="bi bi-person-check"></i> Обновить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
</div>
@include('components.photos.photo-input')
@endsection
