@extends('admin.layouts.app', ['page' => 'qualification'])

@section('title', 'Qualifications')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Qualifications</h3>

                <a class="pull-right btn btn-sm btn-primary" href="{{ route('admin.qualifications.create') }}">
                    Add New
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>

                    @forelse ($qualifications as $qualification)
                        <tr>
                            <td>{{ $qualification->id }}</td>
                            <td>{{ $qualification->name }}</td>
                            <td>
                                <a href="{{ route('admin.qualifications.edit', ['qualification' => $qualification->id]) }}">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>

                                <form action="{{ route('admin.qualifications.destroy', ['qualification' => $qualification->id]) }}"
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
                {{ $qualifications->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
</div>
@endsection
