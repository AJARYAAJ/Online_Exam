<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Exam;
date_default_timezone_set('Asia/Kolkata');

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $data = Exam::latest()->get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<a href="exams/'.$data->id.'" id="'.$data->id.'" class="btn btn-info btn-sm">Show</a>';
                        $button .= '&nbsp;&nbsp;&nbsp;<a href="exams/'.$data->id.'/edit" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</a>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('Admin.exams.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.exams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exam = new Exam();
        $exam->exam_name = $request->exam_name;
        $exam->created_at = date('Y-m-d H:i:s');
        $exam->updated_at = date('Y-m-d H:i:s');

        if ($exam->save() ) {
            return redirect()->route('exams.index')->with(['success' => 'Exam Added successfully.']);
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
        $exam = Exam::find($id);
        return view('Admin.exams.show', compact('exam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exam = Exam::find($id);
        return view('Admin.exams.edit', compact('exam'));
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
        $exams = Exam::find($id);
        $exams->exam_name = $request->exam_name;
        $exams->updated_at = date('Y-m-d H:i:s');

        if ($exams->save() ) {
            return redirect()->route('exams.index')->with(['success' => 'Exam successfully updated.']);
        }

        return redirect()->back()->with(['fail' => 'Unable to update Exam.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Exam::find($id)->delete();
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
