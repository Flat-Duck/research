@extends('admin.layouts.app', ['page' => 'paper'])

@section('title', 'الاوراق البحثية')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">الاوراق البحثية</h3>

                <a class="pull-right btn btn-sm btn-primary" href="{{ route('admin.papers.create') }}">
                    إضافة جديد
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>العنوان</th>
                        <th>الوصف</th>
                        <th>تاريخ النشر</th>
                        <th>عدد الصفحات</th>
                        <th>عدد المراجع</th>
                        <th>اسم الاستاذ</th>
                        <th>مكان النشر </th>
                        <th>التصنيف</th>
                        <th>العمليات</th>
                    </tr>

                    @forelse ($papers as $paper)
                        <tr>
                            <td>{{ $paper->id }}</td>
                            <td>{{ $paper->title }}</td>
                            <td>{{ $paper->description }}</td>
                            <td>{{ $paper->published_at }}</td>
                            <td>{{ $paper->pages }}</td>
                            <td>{{ $paper->references }}</td>
                            {{-- <td>{{ $paper->teachers->first()->name }}</td> --}}
                            <td>{{ $paper->title }}</td>
                            {{-- <td>{{ $paper->getType() }}</td> --}}
                            <td>{{ $paper->college->name }}</td>
                            <td>
                                <a href="{{ route('admin.papers.edit', ['paper' => $paper->id]) }}">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>

                                <form action="{{ route('admin.papers.destroy', ['paper' => $paper->id]) }}"
                                    method="POST"
                                    class="inline pointer"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <a onclick="if (confirm('Are you sure?')) { this.parentNode.submit() }">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">No records found</td>
                        </tr>
                    @endforelse
                </table>
            </div>

            <div class="box-footer clearfix">
                {{ $papers->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
</div>
@endsection
