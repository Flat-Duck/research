@extends('admin.layouts.app', ['page' => 'magazine'])

@section('title', 'المجلات')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">المجلات</h3>

                <a class="pull-right btn btn-sm btn-primary" href="{{ route('admin.magazines.create') }}">
                    إضافة جديد
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>الإسم</th>
                        <th>المجلد</th>
                        <th>عدد</th>
                        <th>العمليات</th>
                    </tr>

                    @forelse ($magazines as $magazine)
                        <tr>
                            <td>{{ $magazine->id }}</td>
                            <td>{{ $magazine->name }}</td>
                            <td>{{ $magazine->folder }}</td>
                            <td>{{ $magazine->number }}</td>
                            <td>
                                <a href="{{ route('admin.magazines.edit', ['magazine' => $magazine->id]) }}">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>

                                <form action="{{ route('admin.magazines.destroy', ['magazine' => $magazine->id]) }}"
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
                            <td colspan="5">No records found</td>
                        </tr>
                    @endforelse
                </table>
            </div>

            <div class="box-footer clearfix">
                {{ $magazines->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
</div>
@endsection
