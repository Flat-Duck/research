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
        {{$paper->title}}
    </div>
    <div class="col-1-52">
        {{$paper->classification->name}}
    </div>
    <div class="col-1-10">
        {{$paper->published_at}}
    </div>
    <div class="col-1-10">
        <a href="{{ $paper->getFirstMediaUrl('attachments') }}"target="_blank">تحميل</a>
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