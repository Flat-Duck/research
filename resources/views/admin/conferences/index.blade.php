@extends('admin.layouts.app', ['page' => 'conference'])

@section('title', 'Conferences')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Conferences</h3>

                <a class="pull-right btn btn-sm btn-primary" href="{{ route('admin.conferences.create') }}">
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

                    @forelse ($conferences as $conference)
                        <tr>
                            <td>{{ $conference->id }}</td>
                            <td>{{ $conference->name }}</td>
                            <td>
                                <a href="{{ route('admin.conferences.edit', ['conference' => $conference->id]) }}">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>

                                <form action="{{ route('admin.conferences.destroy', ['conference' => $conference->id]) }}"
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
                {{ $conferences->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
</div>
@endsection