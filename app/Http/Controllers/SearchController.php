<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \DB;
use App\Paper;
use App\Teacher;
use App\Department;
 use App\Classification;

class SearchController extends Controller
{
    private $searchTypes = [
        1 => 'إسم الورقة',
        2 => 'إسم الباحت',
        3 => 'تخصص الباحت',
        4 => 'تصنيف البحث',
    ];
    public function index()
    {
        $searchTypes = $this->searchTypes;
      
        return view('welcome', compact('searchTypes'));
    }
    
    
    public function search(Request $request)
    {
        $searchTypes = $this->searchTypes;

        switch ($request->type) {
            case 1:
                return $this->searchByPaperName($request);
            break;
            case 2:
                return $this->searchByAuthorName($request);
            break;
            default:
            case 3:
                return $this->searchByAuthorSpecilty($request);
            break;
            case 4:
                return $this->searchByClassification($request);
            break;
            dd("chose right");
        break;
        }
    }


    public function searchByPaperName(Request $request)
    {
        $searchTypes = $this->searchTypes;
        $term = request()->term;
        $papers = Paper::where('title', 'like', '%' .request()->term. '%')->paginate(100);

        return view('result', compact('papers', 'term', 'searchTypes'));
    }
    public function searchByAuthorName(Request $request)
    {
        $searchTypes = $this->searchTypes;
        $term = request()->term;
        $teacher = Teacher::where('name', 'like', '%' .request()->term. '%')->first();
        $papers = $teacher->papers()->paginate(100);

        return view('result', compact('papers', 'term', 'searchTypes'));
    }
    public function searchByAuthorSpecilty(Request $request)
    {
        $searchTypes = $this->searchTypes;
        $term = request()->term;

        $department = Department::where('name', 'like', '%' .request()->term. '%')->first();
      
        $teachers = $department->teachers;//->papers()->paginate(100);
        $papers = collect(new Paper);
      //  dd($teachers);
        foreach ($teachers as $key => $teacher) {

            foreach ($teacher->papers as $key => $paper) {
            $papers->push($paper);

            }
        }
      

        return view('result', compact('papers', 'term', 'searchTypes'));
    }

    public function searchByClassification(Request $request)
    {
        $searchTypes = $this->searchTypes;
        $term = request()->term;
        $papers =[];
        $classification = Classification::where('name', 'like', '%' .request()->term. '%')->first();
        if (!is_null($classification)) {
            $papers = $classification->papers()->paginate(100);
        }
        return view('result', compact('papers', 'term', 'searchTypes'));
    }
}
