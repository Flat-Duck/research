<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;
class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ad::all();
        return view('main',compact('ads'));
    }
}