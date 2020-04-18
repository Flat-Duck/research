@extends('admin.layouts.app', ['page' => 'magazine'])

@section('title', 'Add New Magazine')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add New Magazine</h3>
            </div>

            <form role="form" method="POST" action="{{ route('admin.magazines.store') }}">
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
                        <label for="folder">Folder</label>
                        <input type="text"
                            class="form-control"
                            name="folder"
                            required
                            placeholder="Folder"
                            value="{{ old('folder') }}"
                            id="folder"
                        >
                    </div>

                    <div class="form-group">
                        <label for="number">Number</label>
                        <input type="text"
                            class="form-control"
                            name="number"
                            required
                            placeholder="Number"
                            value="{{ old('number') }}"
                            id="number"
                        >
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>

                    <a href="{{ route('admin.magazines.index') }}" class="btn btn-default">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
