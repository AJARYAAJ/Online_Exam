<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assign_Exam;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Exam;
date_default_timezone_set('Asia/Kolkata');

class AssignExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $data = Assign_Exam::latest()->get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<a href="assign_exams/'.$data->id.'" id="'.$data->id.'" class="btn btn-info btn-sm">Show</a>';
                        $button .= '&nbsp;&nbsp;&nbsp;<a href="assign_exams/'.$data->id.'/edit" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</a>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('Admin.assign_exams.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $exams = Exam::all();
        return view('Admin.assign_exams.create', compact('users', 'exams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student_id = $request->user_id;
        $studentexam_id = $request->exam_id;
        $users = User::all();
        $exams = Exam::all();

        foreach($users as $user) {
            if($user->id == $student_id){
                $username = $user->name;
            }
        }

        foreach($exams as $exam) {
            if($exam->id == $studentexam_id){
                $studentexam_name = $exam->exam_name;
            }
        }

        $assign_exam = new Assign_Exam();
        $assign_exam->user_id = $request->user_id;
        $assign_exam->user_name = $username;
        $assign_exam->exam_id = $request->exam_id;
        $assign_exam->exam_name = $studentexam_name;
        $assign_exam->created_at = date('Y-m-d H:i:s');
        $assign_exam->updated_at = date('Y-m-d H:i:s');

        if ($assign_exam->save() ) {
            return redirect()->route('assign_exams.index')->with(['success' => 'Exam Added successfully.']);
        }

        return redirect()->back()->with(['fail' => 'Unable to add Exams.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assign_exam = Assign_Exam::find($id);
        return view('Admin.assign_exams.show', compact('assign_exam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assign_exam = Assign_Exam::find($id);
        $users = User::all();
        $exams = Exam::all();
        return view('Admin.assign_exams.edit', compact('assign_exam', 'users', 'exams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student_id = $request->user_id;
        $studentexam_id = $request->exam_id;
        $users = User::all();
        $exams = Exam::all();

        foreach($users as $user) {
            if($user->id == $student_id){
                $username = $user->name;
            }
        }

        foreach($exams as $exam) {
            if($exam->id == $studentexam_id){
                $studentexam_name = $exam->exam_name;
            }
        }

        $assign_exam = Assign_Exam::find($id);
        $assign_exam->user_id = $request->user_id;
        $assign_exam->user_name = $username;
        $assign_exam->exam_id = $request->exam_id;
        $assign_exam->exam_name = $studentexam_name;
        $assign_exam->updated_at = date('Y-m-d H:i:s');

        if ($assign_exam->save() ) {
            return redirect()->route('assign_exams.index')->with(['success' => 'Assign Exam successfully updated.']);
        }

        return redirect()->back()->with(['fail' => 'Unable to update Exam Assign.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Assign_Exam::find($id)->delete();
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
