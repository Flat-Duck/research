<?php

namespace App\Http\Controllers\Admin;

use App\Qualification;
use App\Http\Controllers\Controller;

class QualificationController extends Controller
{
    /**
     * Display a list of Qualifications.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qualifications = Qualification::getList();

        return view('admin.qualifications.index', compact('qualifications'));
    }

    /**
     * Show the form for creating a new Qualification
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.qualifications.add');
    }

    /**
     * Save new Qualification
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Qualification::validationRules());

        $qualification = Qualification::create($validatedData);

        return redirect()->route('admin.qualifications.index')->with([
            'type' => 'success',
            'message' => 'Qualification added'
        ]);
    }

    /**
     * Show the form for editing the specified Qualification
     *
     * @param \App\Qualification $qualification
     * @return \Illuminate\Http\Response
     */
    public function edit(Qualification $qualification)
    {
        return view('admin.qualifications.edit', compact('qualification'));
    }

    /**
     * Update the Qualification
     *
     * @param \App\Qualification $qualification
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Qualification $qualification)
    {
        $validatedData = request()->validate(
            Qualification::validationRules($qualification->id)
        );

        $qualification->update($validatedData);

        return redirect()->route('admin.qualifications.index')->with([
            'type' => 'success',
            'message' => 'Qualification Updated'
        ]);
    }

    /**
     * Delete the Qualification
     *
     * @param \App\Qualification $qualification
     * @return void
     */
    public function destroy(Qualification $qualification)
    {
        if ($qualification->teachers()->count()) {
            return redirect()->route('admin.qualifications.index')->with([
                'type' => 'error',
                'message' => 'This record cannot be deleted as there are relationship dependencies.'
            ]);
        }

        $qualification->delete();

        return redirect()->route('admin.qualifications.index')->with([
            'type' => 'success',
            'message' => 'Qualification deleted successfully'
        ]);
    }
}
