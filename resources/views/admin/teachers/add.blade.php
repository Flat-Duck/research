@extends('admin.layouts.app', ['page' => 'teacher'])

@section('title', 'إضافة جديد أستاذ')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">إضافة جديد أستاذ</h3>
            </div>

            <form role="form" method="POST" action="{{ route('admin.teachers.store') }}">
                @csrf

                <div class="box-body">
                    <div class="form-group">
                        <label for="name">الإسم</label>
                        <input type="text"
                            class="form-control"
                            name="name"
                            required
                            placeholder="الإسم"
                            value="{{ old('name') }}"
                            id="name"
                        >
                    </div>

                    <div class="form-group">
                        <label>الجنس</label>
                        <div>
                            @foreach ($genderOptions as $key => $value)
                                <label class="radio-inline">
                                    <input type="radio"
                                        name="gender"
                                        value="{{ $key }}"
                                        {{ old('gender') == $key ? 'checked' : '' }}
                                    >
                                        {{ $value }}
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone">رقم الهاتف</label>
                        <input type="text"
                            class="form-control"
                            name="phone"
                            required
                            placeholder="رقم الهاتف"
                            value="{{ old('phone') }}"
                            id="phone"
                        >
                    </div>

                    <div class="form-group">
                        <label for="email">البريد الإلكتروني</label>
                        <input type="email"
                            class="form-control"
                            name="email"
                            required
                            placeholder="البريد الإلكتروني"
                            value="{{ old('email') }}"
                            id="email"
                        >
                    </div>

                    <div class="form-group">
                        <label for="qualification-id">المؤهل</label>
                        <select class="form-control"
                            name="qualification_id"
                            required
                            id="qualification-id"
                        >
                            @foreach ($qualifications as $qualification)
                                <option value="{{ $qualification->id }}"
                                    {{ old('qualification_id') == $qualification->id ? 'selected' : '' }}
                                >
                                    {{ $qualification->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nationality-id">الجنسية</label>
                        <select class="form-control"
                            name="nationality_id"
                            required
                            id="nationality-id"
                        >
                            @foreach ($nationalities as $nationality)
                                <option value="{{ $nationality->id }}"
                                    {{ old('nationality_id') == $nationality->id ? 'selected' : '' }}
                                >
                                    {{ $nationality->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="college-id">الكلية</label>
                        <select class="form-control"
                            name="college_id"
                            required
                            id="college-id"
                        >
                            @foreach ($colleges as $college)
                                <option value="{{ $college->id }}"
                                    {{ old('college_id') == $college->id ? 'selected' : '' }}
                                >
                                    {{ $college->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="department-id">القسم</label>
                        <select class="form-control"
                            name="department_id"
                            required
                            id="department-id"
                        >
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}"
                                    {{ old('department_id') == $department->id ? 'selected' : '' }}
                                >
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>

                    <a href="{{ route('admin.teachers.index') }}" class="btn btn-default">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
