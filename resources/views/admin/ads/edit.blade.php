@extends('admin.layouts.app', ['page' => 'ad'])

@section('title', 'Edit Ad')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Ad</h3>
            </div>

            <form role="form" method="POST" action="{{ route('admin.ads.update', ['ad' => $ad->id]) }}">
                @csrf
                @method('PUT')

                <div class="box-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text"
                            class="form-control"
                            name="title"
                            required
                            placeholder="Title"
                            value="{{ old('title', $ad->title) }}"
                            id="title"
                        >
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control"
                            name="description"
                            id="description"
                            required
                            placeholder="Description"
                        >{{ old('description', $ad->description) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date"
                            class="form-control"
                            name="date"
                            required
                            placeholder="Date"
                            value="{{ old('date', $ad->date) }}"
                            id="date"
                        >
                    </div>

                    <div class="form-group">
                        <label class="checkbox-inline">
                            <input type="hidden" name="active" value="0">
                            <input type="checkbox"
                                name="active"
                                value="1"
                                {{ old('active', $ad->active) == 1 ? 'checked' : '' }}
                            >
                                Active
                        </label>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>

                    <a href="{{ route('admin.ads.index') }}" class="btn btn-default">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
