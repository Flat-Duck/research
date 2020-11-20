@extends('admin.layouts.app', ['page' => 'report'])

@section('title', 'إداراة التقارير')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">تقرير المساجد في منطقة</h3>
            </div>
            <div class="box-body">
                <form target="_blank" class="form-inline" role="form" method="POST" action="{{ route('admin.report1') }}">
                    @csrf
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="city" class="sr-only">ادخل اسم المنطقة</label>
                        <select class="livesearch form-control" name="id">
                            @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}" {{ old('teachers') && $teacher->id, old('teachers') ? 'selected' : '' }}>
                                {{ $teacher->name }}
                            </option>
                            @endforeach
                       </select>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">عرض</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $('.livesearch').select2({});
    </script>
@endsection
