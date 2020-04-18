<?php

namespace App\Http\Controllers\Admin;

use App\Classification;
use App\Http\Controllers\Controller;

class ClassificationController extends Controller
{
    /**
     * Display a list of Classifications.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classifications = Classification::getList();

        return view('admin.classifications.index', compact('classifications'));
    }

    /**
     * Show the form for creating a new Classification
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.classifications.add');
    }

    /**
     * Save new Classification
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Classification::validationRules());

        $classification = Classification::create($validatedData);

        return redirect()->route('admin.classifications.index')->with([
            'type' => 'success',
            'message' => 'Classification added'
        ]);
    }

    /**
     * Show the form for editing the specified Classification
     *
     * @param \App\Classification $classification
     * @return \Illuminate\Http\Response
     */
    public function edit(Classification $classification)
    {
        return view('admin.classifications.edit', compact('classification'));
    }

    /**
     * Update the Classification
     *
     * @param \App\Classification $classification
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Classification $classification)
    {
        $validatedData = request()->validate(
            Classification::validationRules($classification->id)
        );

        $classification->update($validatedData);

        return redirect()->route('admin.classifications.index')->with([
            'type' => 'success',
            'message' => 'Classification Updated'
        ]);
    }

    /**
     * Delete the Classification
     *
     * @param \App\Classification $classification
     * @return void
     */
    public function destroy(Classification $classification)
    {
        $classification->delete();

        return redirect()->route('admin.classifications.index')->with([
            'type' => 'success',
            'message' => 'Classification deleted successfully'
        ]);
    }
}
