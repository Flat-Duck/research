@extends('admin.layouts.app', ['page' => 'classification'])

@section('title', 'التصنيفات')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">التصنيفات</h3>

                <a class="pull-right btn btn-sm btn-primary" href="{{ route('admin.classifications.create') }}">
                    إضافة جديد
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>الإسم</th>
                        <th>العمليات</th>
                    </tr>

                    @forelse ($classifications as $classification)
                        <tr>
                            <td>{{ $classification->id }}</td>
                            <td>{{ $classification->name }}</td>
                            <td>
                                <a href="{{ route('admin.classifications.edit', ['classification' => $classification->id]) }}">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>

                                <form action="{{ route('admin.classifications.destroy', ['classification' => $classification->id]) }}"
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
                            <td colspan="3">No records found</td>
                        </tr>
                    @endforelse
                </table>
            </div>

            <div class="box-footer clearfix">
                {{ $classifications->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
</div>
@endsection
