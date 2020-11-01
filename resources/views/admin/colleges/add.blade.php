@extends('admin.layouts.app', ['page' => 'college'])

@section('title', 'إضافة جديد الكلية')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">إضافة جديد الكلية</h3>
            </div>

            <form role="form" method="POST" action="{{ route('admin.colleges.store') }}">
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
                        <label for="departments">القسم</label>
                        <select class="form-control"
                            name="departments[]"
                            required
                            multiple
                            id="departments"
                        >
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}"
                                    {{ is_array(old('departments')) && in_array($department->id, old('departments')) ? 'selected' : '' }}
                                >
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>

                    <a href="{{ route('admin.colleges.index') }}" class="btn btn-default">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
