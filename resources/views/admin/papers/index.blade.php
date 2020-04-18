@extends('admin.layouts.app', ['page' => 'paper'])

@section('title', 'Papers')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Papers</h3>

                <a class="pull-right btn btn-sm btn-primary" href="{{ route('admin.papers.create') }}">
                    Add New
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Pages</th>
                        <th>References</th>
                        <th>College</th>
                        <th>Action</th>
                    </tr>

                    @forelse ($papers as $paper)
                        <tr>
                            <td>{{ $paper->id }}</td>
                            <td>{{ $paper->title }}</td>
                            <td>{{ $paper->getType() }}</td>
                            <td>{{ $paper->pages }}</td>
                            <td>{{ $paper->references }}</td>
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
