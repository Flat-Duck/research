@extends('admin.layouts.app', ['page' => 'magazine'])

@section('title', 'Edit Magazine')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Magazine</h3>
            </div>

            <form role="form" method="POST" action="{{ route('admin.magazines.update', ['magazine' => $magazine->id]) }}">
                @csrf
                @method('PUT')

                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text"
                            class="form-control"
                            name="name"
                            required
                            placeholder="Name"
                            value="{{ old('name', $magazine->name) }}"
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
                            value="{{ old('folder', $magazine->folder) }}"
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
                            value="{{ old('number', $magazine->number) }}"
                            id="number"
                        >
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>

                    <a href="{{ route('admin.magazines.index') }}" class="btn btn-default">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
