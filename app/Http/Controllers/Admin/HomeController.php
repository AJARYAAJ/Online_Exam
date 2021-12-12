<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assign_Exam;
use App\Models\Result;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\User;
date_default_timezone_set('Asia/Kolkata');

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin/home');
    }

    public function showRegister() {
        return view('admin/register');
    }

    public function Registration(Request $request) {
        $student = new User;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = $request->password;
        $student->role = 'user';
        $student->created_at = date('Y-m-d H:i:s');
        $student->updated_at = date('Y-m-d H:i:s');

        if ($student->save() ) {
            return redirect()->route('students')->with(['success' => 'Student added successfully.']);
        }

        return redirect()->back()->with(['fail' => 'Unable to add Student.']);
    }

    public function students(Request $request) {
        if($request->ajax()){
            $data = User::latest()->get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<a href="students/'.$data->id.'" id="'.$data->id.'" class="btn btn-info btn-sm">Show</a>';
                        $button .= '&nbsp;&nbsp;&nbsp;<a href="students/'.$data->id.'/edit" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</a>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('Admin.studentList');
    }

    public function edit($id) {
        $students = User::find($id);
        return view('Admin.editStudentList')->with(compact(['students']));
    }

    public function update(Request $request, $id) {
        $students = User::find($id);
        $students->name = $request->name;
        $students->email = $request->email;
        $students->role = $request->role;
        $students->updated_at = date('Y-m-d H:i:s');

        if ($students->save() ) {
            return redirect()->route('students')->with(['success' => 'Students successfully updated.']);
        }

        return redirect()->back()->with(['fail' => 'Unable to update Students.']);
    }

    public function show($id) {
        $students = User::find($id);
        $assign_exams = Assign_Exam::all();
        $results = Result::all();
        return view('Admin.showStudentList', compact('students', 'assign_exams', 'results'));
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
