<?php

namespace App\Http\Controllers;

use App\Exports\StudentExport;
use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    //
    public function students()
    {
        // dd(Student::get());
        return view('student',['students'=>Student::orderBy('id')->get()]);
    }
    public function edit($id){
        // dd($id);
        $student=Student::where('id',$id)->first();
        return view('student_edit',['student'=>$student]);
    }
    public function update(Request $request,$id)
    {
        // dd($id);
        $incomingField=$request->validate([
            "name"=>'required',
            "email"=>['required','email'],
            'phone'=>"required",
            'address'=>'required',
            "regnno"=>'required',
            "department"=>'required'
        ]);
        
        $student=Student::where('id',$id)->first();

        if(isset($request->photo))
        {
            $imageName1=time().'.'.$request->photo->extension();
            $request->photo->move(public_path('students'),$imageName1);
            $student->photo=$imageName1;    
        }
        $student->name=strip_tags($incomingField['name']);
        $student->email=strip_tags($incomingField['email']);
        $student->phone=strip_tags($incomingField['phone']);
        $student->address=strip_tags($incomingField['address']);
        $student->regnno=strip_tags($incomingField['regnno']);
        $student->department=strip_tags($incomingField['department']);
        
        $student->save();
        return redirect('/student')->with(['status'=>true,'message'=>"The data Updated successfully"]);;
        
    }
    public function register(Request $request)
    {
        
        
        $incomingField=$request->validate([
            "name"=>'required',
            "email"=>['required','email'],
            'phone'=>"required",
            'address'=>'required',
            "regnno"=>'required',
            "department"=>'required',
            "photo"=>"required"
            
        ]);
        $imageName=time().'.'.$request->photo->extension();
        $request->photo->move(public_path('students'),$imageName);
        // dd($request->all(),$imageName);
        $incomingField['name']=strip_tags($incomingField['name']);
        $incomingField['email']=strip_tags($incomingField['email']);
        $incomingField['phone']=strip_tags($incomingField['phone']);
        $incomingField['address']=strip_tags($incomingField['address']);
        $incomingField['regnno']=strip_tags($incomingField['regnno']);
        $incomingField['department']=strip_tags($incomingField['department']);
        $incomingField['photo']=$imageName;
        $incomingField['id']=auth()->id();
        // dd($incomingField);
        Student::create($incomingField);
        return redirect('/student')->with(['status'=>true,'message'=>"The data inserted successfully"]);
    }
    public function delete($id)
    {
        $student=Student::where('id',$id)->first();
        $student->delete();
        return redirect('/student')->with(['status'=>true,'message'=>"The data deleted successfully"]);;
    }
    public function export()
    {
        return Excel::download(new StudentExport(), 'student_data.xlsx');
    }
}
