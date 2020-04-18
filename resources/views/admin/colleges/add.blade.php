@extends('admin.layouts.app', ['page' => 'college'])

@section('title', 'Add New College')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add New College</h3>
            </div>

            <form role="form" method="POST" action="{{ route('admin.colleges.store') }}">
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

                    <div class="form-group">
                        <label for="departments">Department</label>
                        <select class="form-control"
                            name="departments[]"
                            required
                            multiple
                            id="departments"
                        >
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}"
                                    {{ is_array(old('departments')) && in_array($department->id, old('departments')) ? 'selected' : '' }}
                                >
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>

                    <a href="{{ route('admin.colleges.index') }}" class="btn btn-default">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
