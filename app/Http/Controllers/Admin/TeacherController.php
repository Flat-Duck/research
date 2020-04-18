<?php

namespace App\Http\Controllers\Admin;

use App\Teacher;
use App\Qualification;
use App\Nationality;
use App\College;
use App\Department;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    /**
     * Display a list of Teachers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::getList();

        return view('admin.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new Teacher
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $qualifications = Qualification::all();
        $nationalities = Nationality::all();
        $colleges = College::all();
        $departments = Department::all();

        $genderOptions = Teacher::$genderOptions;

        return view('admin.teachers.add', compact('genderOptions', 'qualifications', 'nationalities', 'colleges', 'departments'));
    }

    /**
     * Save new Teacher
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Teacher::validationRules());

        $teacher = Teacher::create($validatedData);

        return redirect()->route('admin.teachers.index')->with([
            'type' => 'success',
            'message' => 'Teacher added'
        ]);
    }

    /**
     * Show the form for editing the specified Teacher
     *
     * @param \App\Teacher $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        $qualifications = Qualification::all();
        $nationalities = Nationality::all();
        $colleges = College::all();
        $departments = Department::all();

        $genderOptions = Teacher::$genderOptions;

        return view('admin.teachers.edit', compact('teacher', 'genderOptions', 'qualifications', 'nationalities', 'colleges', 'departments'));
    }

    /**
     * Update the Teacher
     *
     * @param \App\Teacher $teacher
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Teacher $teacher)
    {
        $validatedData = request()->validate(
            Teacher::validationRules($teacher->id)
        );

        $teacher->update($validatedData);

        return redirect()->route('admin.teachers.index')->with([
            'type' => 'success',
            'message' => 'Teacher Updated'
        ]);
    }

    /**
     * Delete the Teacher
     *
     * @param \App\Teacher $teacher
     * @return void
     */
    public function destroy(Teacher $teacher)
    {
        if ($teacher->papers()->count()) {
            return redirect()->route('admin.teachers.index')->with([
                'type' => 'error',
                'message' => 'This record cannot be deleted as there are relationship dependencies.'
            ]);
        }

        $teacher->delete();

        return redirect()->route('admin.teachers.index')->with([
            'type' => 'success',
            'message' => 'Teacher deleted successfully'
        ]);
    }
}
