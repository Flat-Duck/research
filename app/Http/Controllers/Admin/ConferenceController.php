<?php

namespace App\Http\Controllers\Admin;

use App\Conference;
use App\Http\Controllers\Controller;

class ConferenceController extends Controller
{
    /**
     * Display a list of Conferences.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conferences = Conference::getList();

        return view('admin.conferences.index', compact('conferences'));
    }

    /**
     * Show the form for creating a new Conference
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.conferences.add');
    }

    /**
     * Save new Conference
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Conference::validationRules());

        $conference = Conference::create($validatedData);

        return redirect()->route('admin.conferences.index')->with([
            'type' => 'success',
            'message' => 'Conference added'
        ]);
    }

    /**
     * Show the form for editing the specified Conference
     *
     * @param \App\Conference $conference
     * @return \Illuminate\Http\Response
     */
    public function edit(Conference $conference)
    {
        return view('admin.conferences.edit', compact('conference'));
    }

    /**
     * Update the Conference
     *
     * @param \App\Conference $conference
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Conference $conference)
    {
        $validatedData = request()->validate(
            Conference::validationRules($conference->id)
        );

        $conference->update($validatedData);

        return redirect()->route('admin.conferences.index')->with([
            'type' => 'success',
            'message' => 'Conference Updated'
        ]);
    }

    /**
     * Delete the Conference
     *
     * @param \App\Conference $conference
     * @return void
     */
    public function destroy(Conference $conference)
    {
        if ($conference->papers()->count()) {
            return redirect()->route('admin.conferences.index')->with([
                'type' => 'error',
                'message' => 'This record cannot be deleted as there are relationship dependencies.'
            ]);
        }

        $conference->delete();

        return redirect()->route('admin.conferences.index')->with([
            'type' => 'success',
            'message' => 'Conference deleted successfully'
        ]);
    }
}
