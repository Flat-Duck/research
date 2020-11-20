<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Teacher;

class RerportController extends Controller
{
    
    public function index()
    {
        // $nationalities = Nationality::all();
        // $genders = Gender::all();   
        // $mosques = Mosque::all();
         $teachers = Teacher::all();
        // $levels = Level::all();
        // $users = User::all();
        return view("admin.reports.index",compact('teachers'));
    }
    public function papers()
    {
        
        $teacher = Teacher::find(request()->id);  
        $papers = $teacher->papers;
        
      //  dd($teacher->papers);
        return view("admin.reports.result", compact('teacher','papers'));
    }
}
