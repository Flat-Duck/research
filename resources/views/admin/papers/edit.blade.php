@extends('admin.layouts.app', ['page' => 'paper'])

@section('title', 'Edit ورقة بحثية')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit ورقة بحثية</h3>
            </div>

            <form role="form" name="myForm" id="myForm" method="POST" enctype="multipart/form-data" action="{{ route('admin.papers.update', ['paper' => $paper->id]) }}">
                @csrf
                @method('PUT')

                <div class="box-body">
                    <div class="form-group">
                        <label for="title">العنوان</label>
                        <input type="text"
                            class="form-control"
                            name="title"
                            required
                            placeholder="العنوان"
                            value="{{ old('title', $paper->title) }}"
                            id="title"
                        >
                    </div>

                    <div class="form-group">
                        <label for="description">الوصف</label>
                        <textarea class="form-control"
                            name="description"
                            id="description"
                            required
                            placeholder="الوصف"
                        >{{ old('description', $paper->description) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="classification_id">التصنيف</label>
                        <select class="form-control" name="classification_id" required id="classification">
                            @foreach ($classifications as $key => $classification)
                            <option value="{{ $classification->id }}" {{ old('classification_id',$paper->classification_id) == $classification->id ? 'selected' : '' }}>
                    {{ $classification->name }}
                    </option>
                    @endforeach
                    </select>
                </div> 
                    {{-- <div class="form-group">
                        <label for="type">Type</label>
                        <select class="form-control"
                            name="type"
                            required
                            id="type"
                        >
                            @foreach ($typeOptions as $key => $value)
                                <option value="{{ $key }}"
                                    {{ old('type', $paper->type) == $key ? 'selected' : '' }}
                                >
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                    </div> --}}

                    <div class="form-group">
                        <label for="published_at">تاريخ النشر</label>
                        <input type="date"
                            class="form-control"
                            name="published_at"
                            required
                            placeholder="published_at"
                            value="{{ old('published_at', $paper->published_at) }}"
                            id="published_at"
                        >
                    </div>

                    <div class="form-group">
                        <label for="pages">عدد الصفحات</label>
                        <input type="number"
                            class="form-control"
                            name="pages"
                            required
                            placeholder="عدد الصفحات"
                            value="{{ old('pages', $paper->pages) }}"
                            step="any"
                            id="pages"
                        >
                    </div>

                    <div class="form-group">
                        <label for="references">المراجع</label>
                        <input type="number"
                            class="form-control"
                            name="references"
                            required
                            placeholder="المراجع"
                            value="{{ old('references', $paper->references) }}"
                            step="any"
                            id="references"
                        >
                    </div>

                    <a href="{{ $paper->getFirstMediaUrl('attachments') }}"
                        target="_blank"
                    >
                        &#10159; Download Current File
                    </a>
                    <div class="form-group">
                        <label for="attachments">Attachments</label>
                        <input type="file"
                            class="form-control"
                            name="attachments"
                            required
                            value="{{ old('attachments', $paper->attachments) }}"
                            id="attachments"
                        >
                    </div>

                    <div class="form-group">
                        <label for="teachers">أستاذ</label>
                        <select class="form-control"
                            name="teachers[]"
                            required
                            multiple
                            id="teachers"
                        >
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}"
                                    {{ in_array($teacher->id, old('teachers', $paper->teachers)) ? 'selected' : '' }}
                                >
                                    {{ $teacher->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="college-id">الكلية</label>
                        <select class="form-control"
                            name="college_id"
                            required
                            id="college-id"
                        >
                            @foreach ($colleges as $college)
                                <option value="{{ $college->id }}"
                                    {{ old('college_id', $paper->college_id) == $college->id ? 'selected' : '' }}
                                >
                                    {{ $college->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="department-id">القسم</label>
                        <select class="form-control"
                            name="department_id"
                            required
                            id="department-id"
                        >
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}"
                                    {{ old('department_id', $paper->department_id) == $department->id ? 'selected' : '' }}
                                >
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="country">الدولة </label>
                        <input type="text"
                            class="form-control"
                            name="country"
                            required
                            placeholder="الدولة "
                            value="{{ old('country', $paper->country) }}"
                        
                            id="country"
                        >
                    </div>
                   
                    
                    {!! is_null($paper->magazine_id)? '<input id="NoMag" type="hidden" name="NoMag" value="0">':  '<input id="NoMag" type="hidden" name="NoMag" value="1" />' !!}
                <div class="form-group">
                    <label for="RMag">مجلة</label>
                    <input id="RMag" type="radio" name="myRadios" value="1" />
                    <label for="RCon">مؤتمر</label>
                    <input id="RCon" type="radio" name="myRadios" value="2" />
                </div>
                <div id="DMag" class="place" style="background: red">

                    <div class="form-group">
                        <label for="magazine-id">مجلة</label>
                        <select class="form-control" name="magazine_id"  id="magazine-id">
                           
                            @foreach ($magazines as $magazine)
                            <option value="{{ $magazine->id }}"
                                {{ old('magazine_id', $paper->magazine_id) == $magazine->id ? 'selected' : '' }}
                            >
                                {{ $magazine->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="folder">المجلد</label>
                        <input type="text" class="form-control" name="folder"  placeholder="folder"
                            value="{{ old('folder') }}" id="folder">
                    </div>
                    <div class="form-group">
                        <label for="number">العدد</label>
                        <input type="text" class="form-control" name="number"  placeholder="number"
                            value="{{ old('number') }}" id="number">
                    </div>
                </div>
                <div id="DCon" class="place" style="background: green">

                    <div class="form-group">
                        <label for="conference-id">مؤتمر</label>
                        <select class="form-control" name="conference_id"  id="conference-id">
                            @foreach ($conferences as $conference)
                                <option value="{{ $conference->id }}"
                                    {{ old('conference_id', $paper->conference_id) == $conference->id ? 'selected' : '' }}
                                >
                                    {{ $conference->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">تعديل </button>

                    <a href="{{ route('admin.papers.index') }}" class="btn btn-default">
                        إلغاء
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    (function() {
        var x = document.getElementById("NoMag").value;

       
        if(x==0){
        document.getElementById("DMag").style.display = "none"; 
        document.getElementById("RCon").checked = true;
        }else{
        document.getElementById("DCon").style.display = "none"; 
        document.getElementById("RMag").checked = true;
        }
    
    
    })();
    var prev;
    document.forms.myForm.addEventListener('change', function(e) {
        if(e.target.name === 'myRadios') 
        {
            if(e.target.value =="1")
            {
                hidCon();
            }else if(e.target.value =="2")
            {
                hidMag();
            }
        }
    });

    function hidMag() {
        document.getElementById("DMag").style.display = "none";
        document.getElementById("DCon").style.display = "block";
    }
    function hidCon() {
        document.getElementById("DMag").style.display = "block";
        document.getElementById("DCon").style.display = "none";
    }

</script>

@endsection