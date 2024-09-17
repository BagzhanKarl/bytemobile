@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-person-lines-fill"></i> Добавить студента
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Добавить студента</li>
                        </ol>
                    </nav>

                    @include('session-messages')

                    <p class="text-primary">
                        <small><i class="bi bi-exclamation-diamond-fill me-2"></i> Незабудьте создать связанную "Группу" и "секцию" перед добавлением студента</small>
                    </p>
                    <div class="mb-4">
                        <form class="row g-3" action="{{route('school.student.create')}}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label for="inputFirstName" class="form-label">Имя<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputFirstName" name="first_name" placeholder="Имя" required value="{{old('first_name')}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputLastName" class="form-label">Фамилия<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputLastName" name="last_name" placeholder="Фамилия" required value="{{old('last_name')}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Email<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="email" class="form-control" id="inputEmail4" name="email" required value="{{old('email')}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Пароль<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="password" class="form-control" id="inputPassword4" name="password" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="formFile" class="form-label">Фото</label>
                                    <input class="form-control" type="file" id="formFile" onchange="previewFile()">
                                    <div id="previewPhoto"></div>
                                    <input type="hidden" id="photoHiddenInput" name="photo" value="">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputBirthday" class="form-label">День рождения<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="date" class="form-control" id="inputBirthday" name="birthday" placeholder="День рождения" required value="{{old('birthday')}}">
                                </div>
                                <div class="col-3-md">
                                    <label for="inputAddress" class="form-label">Адрес<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Алматы шашкина 14 кв 105" required value="{{old('address')}}">
                                </div>
                                <div class="col-3-md">
                                    <label for="inputAddress2" class="form-label">Второй адрес</label>
                                    <input type="text" class="form-control" id="inputAddress2" name="address2" placeholder="Квартира, студия или этаж" value="{{old('address2')}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputCity" class="form-label">Город<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputCity" name="city" placeholder="Алматы..." required value="{{old('city')}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputZip" class="form-label">Почтовый индекс<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputZip" name="zip" required value="{{old('zip')}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputState" class="form-label">Пол<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <select id="inputState" class="form-select" name="gender" required>
                                        <option value="Male" {{old('gender') == 'male' ? 'selected' : ''}}>Мужской</option>
                                        <option value="Female" {{old('gender') == 'female' ? 'selected' : ''}}>Женский</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputNationality" class="form-label">Национальность<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputNationality" name="nationality" placeholder="e.g. Казах ..." required value="{{old('nationality')}}">
                                </div>
                                <div class="col-md-4">
                                    <label for="inputBloodType" class="form-label">Группа крови<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <select id="inputBloodType" class="form-select" name="blood_type" required>
                                        <option {{old('blood_type') == 'A+' ? 'selected' : ''}}>Первая положительная</option>
                                        <option {{old('blood_type') == 'A-' ? 'selected' : ''}}>Первая отрицательная</option>
                                        <option {{old('blood_type') == 'B+' ? 'selected' : ''}}>Вторая положительная</option>
                                        <option {{old('blood_type') == 'B-' ? 'selected' : ''}}>Вторая отрицательная</option>
                                        <option {{old('blood_type') == 'O+' ? 'selected' : ''}}>Третья положительная</option>
                                        <option {{old('blood_type') == 'O-' ? 'selected' : ''}}>Третья отрицательная</option>
                                        <option {{old('blood_type') == 'AB+' ? 'selected' : ''}}>Четвертая положительная</option>
                                        <option {{old('blood_type') == 'AB-' ? 'selected' : ''}}>Четвертая отрицательная</option>
                                        <option {{old('blood_type') == 'other' ? 'selected' : ''}}>Другие</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputReligion" class="form-label">Религия<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <select id="inputReligion" class="form-select" name="religion" required>
                                        <option {{old('religion') == 'Islam' ? 'selected' : ''}}>Ислам</option>
                                        <option {{old('religion') == 'Hinduism' ? 'selected' : ''}}>Индуизм</option>
                                        <option {{old('religion') == 'Christianity' ? 'selected' : ''}}>Христианство</option>
                                        <option {{old('religion') == 'Buddhism' ? 'selected' : ''}}>Буддизм</option>
                                        <option {{old('religion') == 'Judaism' ? 'selected' : ''}}>Иудаизм</option>
                                        <option {{old('religion') == 'Others' ? 'selected' : ''}}>Другие</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputPhone" class="form-label">Номер<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputPhone" name="phone" placeholder="+7 702......" required value="{{old('phone')}}">
                                </div>
                                <div class="col-5-md">
                                    <label for="inputIdCardNumber" class="form-label">Id карты<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputIdCardNumber" name="id_card_number" placeholder="e.g. 2021-03-01-02-01 (Год, семестр, группа реестр секции)" required value="{{old('id_card_number')}}">
                                </div>
                            </div>
                            <div class="row mt-4 g-3">
                                <h6>Информация про родителей</h6>
                                <div class="col-md-3">
                                    <label for="inputFatherName" class="form-label">Имя отца<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputFatherName" name="father_name" placeholder="Имя отца" required value="{{old('father_name')}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputFatherPhone" class="form-label">Номер отца<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputFatherPhone" name="father_phone" placeholder="+7 700......" required value="{{old('father_phone')}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputMotherName" class="form-label">Имя матери<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputMotherName" name="mother_name" placeholder="Имя матери" required value="{{old('mother_name')}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputMotherPhone" class="form-label">Номер матери<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputMotherPhone" name="mother_phone" placeholder="+7 775......" required value="{{old('mother_name')}}">
                                </div>
                                <div class="col-4-md">
                                    <label for="inputParentAddress" class="form-label">Адрес<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputParentAddress" name="parent_address" placeholder="Алматы шашкина 14 кв105" required value="{{old('parent_address')}}">
                                </div>
                            </div>
                            <div class="row mt-4 g-3">
                                <h6>Академическая информация</h6>
                                <div class="col-md-6">
                                    <label for="inputAssignToClass" class="form-label">Назначить группу:<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <select onchange="getSections(this);" class="form-select" id="inputAssignToClass" name="class_id" required>
                                        @isset($school_classes)
                                            <option selected disabled>Пожалуйста выберите группу</option>
                                            @foreach ($school_classes as $school_class)
                                                <option value="{{$school_class->id}}" >{{$school_class->class_name}}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputAssignToSection" class="form-label">Выберите секцию:<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <select class="form-select" id="inputAssignToSection" name="section_id" required>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="inputBoardRegistrationNumber" class="form-label">Регистрационный номер доски.</label>
                                    <input type="text" class="form-control" id="inputBoardRegistrationNumber" name="board_reg_no" placeholder="Регистрационный номер." value="{{old('board_reg_no')}}">
                                </div>
                                <input type="hidden" name="session_id" value="{{$current_school_session_id}}">
                            </div>
                            <div class="row mt-4">
                                <div class="col-12-md">
                                    <button type="submit" class="btn btn-sm btn-outline-primary"><i class="bi bi-person-plus"></i> Добавить</button>
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
<script>
    function getSections(obj) {
        var class_id = obj.options[obj.selectedIndex].value;

        var url = "{{route('get.sections.courses.by.classId')}}?class_id=" + class_id 

        fetch(url)
        .then((resp) => resp.json())
        .then(function(data) {
            var sectionSelect = document.getElementById('inputAssignToSection');
            sectionSelect.options.length = 0;
            data.sections.unshift({'id': 0,'section_name': 'Пожалуйста выберите секцию'})
            data.sections.forEach(function(section, key) {
                sectionSelect[key] = new Option(section.section_name, section.id);
            });
        })
        .catch(function(error) {
            console.log(error);
        });
    }
</script>
@include('components.photos.photo-input')
@endsection
