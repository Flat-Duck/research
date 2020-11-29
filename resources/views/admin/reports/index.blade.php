
@extends('admin.layouts.app', ['page' => 'report'])

@section('title', 'إداراة التقارير')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">تقرير الاوراق البحثية</h3>

            </div>
            <div class="box-body">
                <table id="table" class="table table-bordered">
                    <thead>

                        <tr>
                            <th>#</th>
                            <th>العنوان</th>
                            <th>تاريخ النشر</th>
                            <th>عدد الصفحات</th>
                            <th>عدد المراجع</th>
                            <th>اسم الاستاذ</th>
                            <th>مكان النشر </th>
                            <th>التصنيف</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @forelse ($papers as $k=> $paper)
                        <tr>
                            <td>{{ $k+1 }}</td>
                            <td>{{ $paper->title }}</td>
                            <td>{{ $paper->published_at }}</td>
                            <td>{{ $paper->pages }}</td>
                            <td>{{ $paper->references }}</td>
                            <td>{{ is_null($paper->teachers->first())? '':$paper->teachers->first()->name }}</td>
                            <td>{{ is_null($paper->magazine_id)?$paper->conference->name : $paper->magazine->name }}</td>
                            
                            {{-- <td>{{ $paper->getType() }}</td> --}}
                            <td>{{ $paper->classification->name }}</td>
                            <td>
                                <a href="{{ $paper->getFirstMediaUrl('attachments') }}"target="_blank">تحميل</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">لاتوجد بيانات</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- <div class="box-footer clearfix">
                {{ $papers->links('vendor.pagination.default') }}
            </div> --}}
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    
 $   
    language: {
  'search' : '' /*Empty to remove the label*/
}
    </script>    

    
@endpush


{{-- @extends('admin.layouts.app', ['page' => 'report'])

@section('title', 'إداراة التقارير')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">تقرير الاوراق البحثية</h3>
            </div>
            <div class="box-body">
                <form target="_blank" class="form-inline" role="form" method="POST" action="{{ route('admin.report1') }}">
                    @csrf
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="city" class="sr-only">اختار اسم الشخص</label>
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
@endsection --}}
