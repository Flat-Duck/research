<?php

namespace App\Http\Controllers\Admin;

use App\College;
use App\Department;
use App\Http\Controllers\Controller;

class CollegeController extends Controller
{
    /**
     * Display a list of Colleges.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colleges = College::getList();

        return view('admin.colleges.index', compact('colleges'));
    }

    /**
     * Show the form for creating a new College
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();

        return view('admin.colleges.add', compact('departments'));
    }

    /**
     * Save new College
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(College::validationRules());

        unset($validatedData['departments']);
        $college = College::create($validatedData);

        $college->departments()->sync(request('departments'));

        return redirect()->route('admin.colleges.index')->with([
            'type' => 'success',
            'message' => 'College added'
        ]);
    }

    /**
     * Show the form for editing the specified College
     *
     * @param \App\College $college
     * @return \Illuminate\Http\Response
     */
    public function edit(College $college)
    {
        $departments = Department::all();

        $college->departments = $college->departments->pluck('id')->toArray();

        return view('admin.colleges.edit', compact('college', 'departments'));
    }

    /**
     * Update the College
     *
     * @param \App\College $college
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(College $college)
    {
        $validatedData = request()->validate(
            College::validationRules($college->id)
        );

        unset($validatedData['departments']);
        $college->update($validatedData);

        $college->departments()->sync(request('departments'));

        return redirect()->route('admin.colleges.index')->with([
            'type' => 'success',
            'message' => 'College Updated'
        ]);
    }

    /**
     * Delete the College
     *
     * @param \App\College $college
     * @return void
     */
    public function destroy(College $college)
    {
        if ($college->teachers()->count() || $college->papers()->count() || $college->departments()->count()) {
            return redirect()->route('admin.colleges.index')->with([
                'type' => 'error',
                'message' => 'This record cannot be deleted as there are relationship dependencies.'
            ]);
        }

        $college->delete();

        return redirect()->route('admin.colleges.index')->with([
            'type' => 'success',
            'message' => 'College deleted successfully'
        ]);
    }
}
