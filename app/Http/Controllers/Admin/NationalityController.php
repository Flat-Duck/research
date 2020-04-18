<?php

namespace App\Http\Controllers\Admin;

use App\Nationality;
use App\Http\Controllers\Controller;

class NationalityController extends Controller
{
    /**
     * Display a list of Nationalities.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nationalities = Nationality::getList();

        return view('admin.nationalities.index', compact('nationalities'));
    }

    /**
     * Show the form for creating a new Nationality
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.nationalities.add');
    }

    /**
     * Save new Nationality
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Nationality::validationRules());

        $nationality = Nationality::create($validatedData);

        return redirect()->route('admin.nationalities.index')->with([
            'type' => 'success',
            'message' => 'Nationality added'
        ]);
    }

    /**
     * Show the form for editing the specified Nationality
     *
     * @param \App\Nationality $nationality
     * @return \Illuminate\Http\Response
     */
    public function edit(Nationality $nationality)
    {
        return view('admin.nationalities.edit', compact('nationality'));
    }

    /**
     * Update the Nationality
     *
     * @param \App\Nationality $nationality
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Nationality $nationality)
    {
        $validatedData = request()->validate(
            Nationality::validationRules($nationality->id)
        );

        $nationality->update($validatedData);

        return redirect()->route('admin.nationalities.index')->with([
            'type' => 'success',
            'message' => 'Nationality Updated'
        ]);
    }

    /**
     * Delete the Nationality
     *
     * @param \App\Nationality $nationality
     * @return void
     */
    public function destroy(Nationality $nationality)
    {
        if ($nationality->teachers()->count()) {
            return redirect()->route('admin.nationalities.index')->with([
                'type' => 'error',
                'message' => 'This record cannot be deleted as there are relationship dependencies.'
            ]);
        }

        $nationality->delete();

        return redirect()->route('admin.nationalities.index')->with([
            'type' => 'success',
            'message' => 'Nationality deleted successfully'
        ]);
    }
}
