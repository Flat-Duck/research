<?php

namespace App\Http\Controllers\Admin;

use App\Paper;
use App\Teacher;
use App\College;
use App\Department;
use App\Magazine;
use App\Conference;
use App\Http\Controllers\Controller;

class PaperController extends Controller
{
    /**
     * Display a list of Papers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $papers = Paper::getList();

        return view('admin.papers.index', compact('papers'));
    }

    /**
     * Show the form for creating a new Paper
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::all();
        $colleges = College::all();
        $departments = Department::all();
        $magazines = Magazine::all();
        $conferences = Conference::all();

        $typeOptions = Paper::$typeOptions;

        return view('admin.papers.add', compact('typeOptions', 'teachers', 'colleges', 'departments', 'magazines', 'conferences'));
    }

    /**
     * Save new Paper
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Paper::validationRules());

        unset($validatedData['attachments'], $validatedData['teachers']);
        $paper = Paper::create($validatedData);

        $paper->addMediaFromRequest('attachments')->toMediaCollection('attachments');

        $paper->teachers()->sync(request('teachers'));

        return redirect()->route('admin.papers.index')->with([
            'type' => 'success',
            'message' => 'Paper added'
        ]);
    }

    /**
     * Show the form for editing the specified Paper
     *
     * @param \App\Paper $paper
     * @return \Illuminate\Http\Response
     */
    public function edit(Paper $paper)
    {
        $teachers = Teacher::all();
        $colleges = College::all();
        $departments = Department::all();
        $magazines = Magazine::all();
        $conferences = Conference::all();

        $paper->teachers = $paper->teachers->pluck('id')->toArray();

        $typeOptions = Paper::$typeOptions;

        return view('admin.papers.edit', compact('paper', 'typeOptions', 'teachers', 'colleges', 'departments', 'magazines', 'conferences'));
    }

    /**
     * Update the Paper
     *
     * @param \App\Paper $paper
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Paper $paper)
    {
        $validatedData = request()->validate(
            Paper::validationRules($paper->id)
        );

        unset($validatedData['attachments'], $validatedData['teachers']);
        $paper->update($validatedData);

        $paper->addMediaFromRequest('attachments')->toMediaCollection('attachments');

        $paper->teachers()->sync(request('teachers'));

        return redirect()->route('admin.papers.index')->with([
            'type' => 'success',
            'message' => 'Paper Updated'
        ]);
    }

    /**
     * Delete the Paper
     *
     * @param \App\Paper $paper
     * @return void
     */
    public function destroy(Paper $paper)
    {
        if ($paper->teachers()->count()) {
            return redirect()->route('admin.papers.index')->with([
                'type' => 'error',
                'message' => 'This record cannot be deleted as there are relationship dependencies.'
            ]);
        }

        $paper->delete();

        return redirect()->route('admin.papers.index')->with([
            'type' => 'success',
            'message' => 'Paper deleted successfully'
        ]);
    }
}
