@extends('admin.layouts.app', ['page' => 'magazine'])

@section('title', 'إضافة جديد مجلة')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">إضافة جديد مجلة</h3>
            </div>

            <form role="form" method="POST" action="{{ route('admin.magazines.store') }}">
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
                        <label for="folder">المجلد</label>
                        <input type="text"
                            class="form-control"
                            name="folder"
                            required
                            placeholder="المجلد"
                            value="{{ old('folder') }}"
                            id="folder"
                        >
                    </div>

                    <div class="form-group">
                        <label for="number">عدد</label>
                        <input type="text"
                            class="form-control"
                            name="number"
                            required
                            placeholder="عدد"
                            value="{{ old('number') }}"
                            id="number"
                        >
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">حفظ</button>

                    <a href="{{ route('admin.magazines.index') }}" class="btn btn-default">
                        إلغاء
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
