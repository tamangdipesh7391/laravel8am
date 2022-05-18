<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class StudentController extends Controller
{
    public function index()
    {
        $studentData = Student::all();
        return view('pages.student.index',[
            'studentData' => $studentData 
        ]);
    }
    public function create(Request $request)
    {

        if ($request->isMethod('get')) {
            return view('pages.student.add');
        }
        if ($request->isMethod('post')) {

            $request->validate([
                'fname' => 'required',
                'lname' => 'required',
                'gender' => 'required',
                'city' => 'required',
                'country' => 'required',
                'phone' => 'required|unique:students,phone',
                'email' => 'required|unique:students,email',

            ]);
            
            $name = $request->fname.' '.$request->mname.' '.$request->lname;

            $studentData = $request->all();
            Student::create($studentData);
            return redirect()->back()->with('success','Data of '.$name.' inserted successfully.');
        }
       
       }
    public function edit(Request $request,$id)
    {
        if($request->isMethod('get')){
            $singleStudentData = Student::findOrFail($id);
            return view('pages.student.edit',[
                'studentData' => $singleStudentData
            ]);
        }
        if($request->isMethod('post')){
            $data = Student::findOrFail($id);
            $data->update($request->all());
        return redirect('display-student')->with('success','Data updated successfully.');

        }
    }
    public function destroy($id)
    {
        Student::findOrFail($id)->delete();
        return redirect()->back()->with('success','Data deleted successfully.');
    }

    // public function show($id){
    //     $singleData = Student::findOrFail($id);

    //     return view('pages.student.index',[
    //         'singleData' => $singleData
    //     ]);
    // }
    public function changeStatus($id)
    {
    }
}
