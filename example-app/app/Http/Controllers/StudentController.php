<?php

namespace App\Http\Controllers;

use App\Models\Academic;
use App\Models\Country;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){

        $students = Student::with('academic', 'country')->get();
        
        return view('index', ['students' => $students]);

    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        
        $data = $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'address' => 'required',
            'academic.course' => 'required',
            'academic.year' => 'required|integer',
            'country.continent' => 'required',
            'country.name' => 'required',
            'country.capital' => 'required',
        ]);

        $student = Student::create($data);
        $student->academic()->create($request->input('academic'));
        $student->country()->create($request->input('country'));

        return redirect(route('student.index'));
    }

    public function edit(Student $id){
        return view('edit', ['student' => $id]);
    
    }

    public function update(Student $id, Request $request){

        $data = $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'address' => 'required',
            'academic.course' => 'required',
            'academic.year' => 'required|integer',
            'country.continent' => 'required',
            'country.name' => 'required',
            'country.capital' => 'required',
        ]);
       
        $id->update($data);
        $id->academic()->update($request->input('academic'));
        $id->country()->update($request->input('country'));
       
        

        return redirect(route('student.index'));
    }

    public function delete(Student $id ){
        $id->academic()->delete();
        $id->country()->delete();
        $id->delete();
       
        return redirect(route('student.index'));
    }
}
