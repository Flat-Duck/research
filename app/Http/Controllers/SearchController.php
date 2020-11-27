<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \DB;
use App\Paper;
use App\Teacher;

class SearchController extends Controller
{
    private $searchTypes = [
        1 => 'إسم الورقة',
        2 => 'إسم الباجت',
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
}
