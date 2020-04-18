@extends('admin.layouts.app', ['page' => 'department'])

@section('title', 'Add New Department')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add New Department</h3>
            </div>

            <form role="form" method="POST" action="{{ route('admin.departments.store') }}">
                @csrf

                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text"
                            class="form-control"
                            name="name"
                            required
                            placeholder="Name"
                            value="{{ old('name') }}"
                            id="name"
                        >
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>

                    <a href="{{ route('admin.departments.index') }}" class="btn btn-default">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
