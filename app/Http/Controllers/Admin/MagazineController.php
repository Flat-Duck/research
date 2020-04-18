<?php

namespace App\Http\Controllers\Admin;

use App\Magazine;
use App\Http\Controllers\Controller;

class MagazineController extends Controller
{
    /**
     * Display a list of Magazines.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $magazines = Magazine::getList();

        return view('admin.magazines.index', compact('magazines'));
    }

    /**
     * Show the form for creating a new Magazine
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.magazines.add');
    }

    /**
     * Save new Magazine
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Magazine::validationRules());

        $magazine = Magazine::create($validatedData);

        return redirect()->route('admin.magazines.index')->with([
            'type' => 'success',
            'message' => 'Magazine added'
        ]);
    }

    /**
     * Show the form for editing the specified Magazine
     *
     * @param \App\Magazine $magazine
     * @return \Illuminate\Http\Response
     */
    public function edit(Magazine $magazine)
    {
        return view('admin.magazines.edit', compact('magazine'));
    }

    /**
     * Update the Magazine
     *
     * @param \App\Magazine $magazine
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Magazine $magazine)
    {
        $validatedData = request()->validate(
            Magazine::validationRules($magazine->id)
        );

        $magazine->update($validatedData);

        return redirect()->route('admin.magazines.index')->with([
            'type' => 'success',
            'message' => 'Magazine Updated'
        ]);
    }

    /**
     * Delete the Magazine
     *
     * @param \App\Magazine $magazine
     * @return void
     */
    public function destroy(Magazine $magazine)
    {
        if ($magazine->papers()->count()) {
            return redirect()->route('admin.magazines.index')->with([
                'type' => 'error',
                'message' => 'This record cannot be deleted as there are relationship dependencies.'
            ]);
        }

        $magazine->delete();

        return redirect()->route('admin.magazines.index')->with([
            'type' => 'success',
            'message' => 'Magazine deleted successfully'
        ]);
    }
}
