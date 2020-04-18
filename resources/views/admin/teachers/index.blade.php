@extends('admin.layouts.app', ['page' => 'teacher'])

@section('title', 'Teachers')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Teachers</h3>

                <a class="pull-right btn btn-sm btn-primary" href="{{ route('admin.teachers.create') }}">
                    Add New
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Qualification</th>
                        <th>Action</th>
                    </tr>

                    @forelse ($teachers as $teacher)
                        <tr>
                            <td>{{ $teacher->id }}</td>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->getGender() }}</td>
                            <td>{{ $teacher->phone }}</td>
                            <td>{{ $teacher->email }}</td>
                            <td>{{ $teacher->qualification->name }}</td>
                            <td>
                                <a href="{{ route('admin.teachers.edit', ['teacher' => $teacher->id]) }}">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>

                                <form action="{{ route('admin.teachers.destroy', ['teacher' => $teacher->id]) }}"
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
                {{ $teachers->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
</div>
@endsection
