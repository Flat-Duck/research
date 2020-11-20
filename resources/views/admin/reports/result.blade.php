@extends('admin.layouts.reports', ['page' => 'dashboard'])

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-1-5 panel">
        #
    </div>
    <div class="col-1-10 panel">
        عنوان ورقة البحث
    </div>
    <div class="col-1-52 panel">
        تصنيف ورقة البحث
    </div>
    <div class="col-1-10 panel">
        تاريخ النشر
    </div>
    <div class="col-1-10 panel">
         تحميل
    </div>
</div>
@if (!is_null($papers))
@forelse ($papers as $k=> $paper)

<div class="row">
    <div class="col-1-5">
        {{$k+1}}
    </div>
    <div class="col-1-10">
        {{$paper->name}}
    </div>
    <div class="col-1-52">
        {{$paper->address}}
    </div>
    <div class="col-1-10">
        {{$paper->street}}
    </div>
    <div class="col-1-10">
        {{$paper->date_construction}}
    </div>
</div>
@empty
<p>لاتوجد بيانات</p>
@endforelse

@endif
<div class="row panel">
    <div class="col-1-5 panel">
        #
    </div>
    <div class="col-1-10 panel">
        عنوان ورقة البحث
    </div>
    <div class="col-1-52 panel">
        تصنيف ورقة البحث
    </div>
    <div class="col-1-10 panel">
        تاريخ النشر
    </div>
    <div class="col-1-10 panel">
         تحميل
    </div>
</div>
@endsection