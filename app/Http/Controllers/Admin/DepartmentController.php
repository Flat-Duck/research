<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    /**
     * Display a list of Departments.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::getList();

        return view('admin.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new Department
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.departments.add');
    }

    /**
     * Save new Department
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Department::validationRules());

        $department = Department::create($validatedData);

        return redirect()->route('admin.departments.index')->with([
            'type' => 'success',
            'message' => 'Department added'
        ]);
    }

    /**
     * Show the form for editing the specified Department
     *
     * @param \App\Department $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view('admin.departments.edit', compact('department'));
    }

    /**
     * Update the Department
     *
     * @param \App\Department $department
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Department $department)
    {
        $validatedData = request()->validate(
            Department::validationRules($department->id)
        );

        $department->update($validatedData);

        return redirect()->route('admin.departments.index')->with([
            'type' => 'success',
            'message' => 'Department Updated'
        ]);
    }

    /**
     * Delete the Department
     *
     * @param \App\Department $department
     * @return void
     */
    public function destroy(Department $department)
    {
        if ($department->teachers()->count() || $department->papers()->count() || $department->colleges()->count()) {
            return redirect()->route('admin.departments.index')->with([
                'type' => 'error',
                'message' => 'This record cannot be deleted as there are relationship dependencies.'
            ]);
        }

        $department->delete();

        return redirect()->route('admin.departments.index')->with([
            'type' => 'success',
            'message' => 'Department deleted successfully'
        ]);
    }
}
