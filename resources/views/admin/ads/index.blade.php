@extends('admin.layouts.app', ['page' => 'ad'])

@section('title', 'الاعلانات')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">الاعلانات</h3>

                <a class="pull-right btn btn-sm btn-primary" href="{{ route('admin.ads.create') }}">
                    إضافة جديد
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>العنوان</th>
                        <th>التاريخ</th>
                        <th>العمليات</th>
                    </tr>

                    @forelse ($ads as $ad)
                        <tr>
                            <td>{{ $ad->id }}</td>
                            <td>{{ $ad->title }}</td>
                            <td>{{ $ad->date }}</td>
                            <td>
                                <a href="{{ route('admin.ads.edit', ['ad' => $ad->id]) }}">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>

                                <form action="{{ route('admin.ads.destroy', ['ad' => $ad->id]) }}"
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
                            <td colspan="4">No records found</td>
                        </tr>
                    @endforelse
                </table>
            </div>

            <div class="box-footer clearfix">
                {{ $ads->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
</div>
@endsection
