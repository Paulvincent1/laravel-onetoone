<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('academic', 'country')->get();
        return response()->json(['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student = Student::create($request->all());
        $student->academic()->create($request->input('academic'));
        $student->country()->create($request->input('country'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $stud = $student->load('academic', 'country');
        return response()->json(['student' => $stud]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $student->update($request->all());
        $student->academic()->update($request->input('academic'));
        $student->country()->update($request->input('country'));
        return response()->json(['student' => $student]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->academic()->delete();
        $student->country()->delete();
        $student->delete();
        return response()->json(['message' => 'deleted successfully']);
    }
}
