<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Teacher;
use App\Paper;

class RerportController extends Controller
{
    
    public function index()
    {
        $papers = Paper::all();

       // return view('admin.papers.index', compact('papers'));
        // $nationalities = Nationality::all();
        // $genders = Gender::all();   
        // $mosques = Mosque::all();
       //  $teachers = Teacher::all();
        // $levels = Level::all();
        // $users = User::all();
        return view("admin.reports.index",compact('papers'));
    }
    public function papers()
    {
        
        $teacher = Teacher::find(request()->id);  
        $papers = $teacher->papers;
        
      //  dd($teacher->papers);
        return view("admin.reports.result", compact('teacher','papers'));
    }
}
