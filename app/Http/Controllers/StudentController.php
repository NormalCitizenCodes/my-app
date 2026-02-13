<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // READ: Get all students
    public function index()
    {
        return Student::all();
    }

    // CREATE: Save a new student
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'course' => 'required',
        ]);

        return Student::create($validated);
    }

    // READ: Get one specific student
    public function show(Student $student)
    {
        return $student;
    }

    // UPDATE: Edit an existing student
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required',
            'course' => 'required',
        ]);

        $student->update($validated);
        return $student;
    }

    // DELETE: Remove a student
    public function destroy(Student $student)
    {
        $student->delete();
        return response()->json(['message' => 'Student deleted successfully']);
    }
}