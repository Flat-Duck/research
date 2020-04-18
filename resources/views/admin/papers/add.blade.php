@extends('admin.layouts.app', ['page' => 'paper'])

@section('title', 'Add New Paper')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add New Paper</h3>
            </div>

            <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.papers.store') }}">
                @csrf

                <div class="box-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text"
                            class="form-control"
                            name="title"
                            required
                            placeholder="Title"
                            value="{{ old('title') }}"
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
                        >{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="type">Type</label>
                        <select class="form-control"
                            name="type"
                            required
                            id="type"
                        >
                            @foreach ($typeOptions as $key => $value)
                                <option value="{{ $key }}"
                                    {{ old('type') == $key ? 'selected' : '' }}
                                >
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="checkbox-inline">
                            <input type="hidden" name="published_at" value="0">
                            <input type="checkbox"
                                name="published_at"
                                value="1"
                                {{ old('published_at') == 1 ? 'checked' : '' }}
                            >
                                Published At
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="checkbox-inline">
                            <input type="hidden" name="publish_place" value="0">
                            <input type="checkbox"
                                name="publish_place"
                                value="1"
                                {{ old('publish_place') == 1 ? 'checked' : '' }}
                            >
                                Publish Place
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="pages">Pages</label>
                        <input type="number"
                            class="form-control"
                            name="pages"
                            required
                            placeholder="Pages"
                            value="{{ old('pages') }}"
                            step="any"
                            id="pages"
                        >
                    </div>

                    <div class="form-group">
                        <label for="references">References</label>
                        <input type="number"
                            class="form-control"
                            name="references"
                            required
                            placeholder="References"
                            value="{{ old('references') }}"
                            step="any"
                            id="references"
                        >
                    </div>

                    <div class="form-group">
                        <label for="attachments">Attachments</label>
                        <input type="file"
                            class="form-control"
                            name="attachments"
                            required
                            value="{{ old('attachments') }}"
                            id="attachments"
                        >
                    </div>

                    <div class="form-group">
                        <label for="teachers">Teacher</label>
                        <select class="form-control"
                            name="teachers[]"
                            required
                            multiple
                            id="teachers"
                        >
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}"
                                    {{ is_array(old('teachers')) && in_array($teacher->id, old('teachers')) ? 'selected' : '' }}
                                >
                                    {{ $teacher->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="college-id">College</label>
                        <select class="form-control"
                            name="college_id"
                            required
                            id="college-id"
                        >
                            @foreach ($colleges as $college)
                                <option value="{{ $college->id }}"
                                    {{ old('college_id') == $college->id ? 'selected' : '' }}
                                >
                                    {{ $college->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="department-id">Department</label>
                        <select class="form-control"
                            name="department_id"
                            required
                            id="department-id"
                        >
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}"
                                    {{ old('department_id') == $department->id ? 'selected' : '' }}
                                >
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="magazine-id">Magazine</label>
                        <select class="form-control"
                            name="magazine_id"
                            required
                            id="magazine-id"
                        >
                            @foreach ($magazines as $magazine)
                                <option value="{{ $magazine->id }}"
                                    {{ old('magazine_id') == $magazine->id ? 'selected' : '' }}
                                >
                                    {{ $magazine->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="conference-id">Conference</label>
                        <select class="form-control"
                            name="conference_id"
                            required
                            id="conference-id"
                        >
                            @foreach ($conferences as $conference)
                                <option value="{{ $conference->id }}"
                                    {{ old('conference_id') == $conference->id ? 'selected' : '' }}
                                >
                                    {{ $conference->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>

                    <a href="{{ route('admin.papers.index') }}" class="btn btn-default">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
