@extends('admin.layouts.app', ['page' => 'college'])

@section('title', 'تعديل الكلية')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">تعديل الكلية</h3>
            </div>

            <form role="form" method="POST" action="{{ route('admin.colleges.update', ['college' => $college->id]) }}">
                @csrf
                @method('PUT')

                <div class="box-body">
                    <div class="form-group">
                        <label for="name">الإسم</label>
                        <input type="text"
                            class="form-control"
                            name="name"
                            required
                            placeholder="الإسم"
                            value="{{ old('name', $college->name) }}"
                            id="name"
                        >
                    </div>

                    <div class="form-group">
                        <label for="departments">القسم</label>
                        <select class="form-control"
                            name="departments[]"
                            required
                            multiple
                            id="departments"
                        >
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}"
                                    {{ in_array($department->id, old('departments', $college->departments)) ? 'selected' : '' }}
                                >
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">تعديل</button>

                    <a href="{{ route('admin.colleges.index') }}" class="btn btn-default">
                        إلغاء
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
