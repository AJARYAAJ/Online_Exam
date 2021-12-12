<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Exam;
use App\Models\Question;
date_default_timezone_set('Asia/Kolkata');

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $data = Question::latest()->get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<a href="questions/'.$data->id.'" id="'.$data->id.'" class="btn btn-info btn-sm">Show</a>';
                        $button .= '&nbsp;&nbsp;&nbsp;<a href="questions/'.$data->id.'/edit" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</a>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('Admin.questions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exams = Exam::all();
        return view('Admin.questions.create', compact('exams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = new Question();
        $question->exam_id = $request->exam_id;
        $question->question = $request->question;
        $question->option_a = $request->option_a;
        $question->option_b = $request->option_b;
        $question->option_c = $request->option_c;
        $question->option_d = $request->option_d;
        $question->answer = $request->answer;
        $question->created_at = date('Y-m-d H:i:s');
        $question->updated_at = date('Y-m-d H:i:s');

        if ($question->save() ) {
            return redirect()->route('questions.index')->with(['success' => 'Question Added successfully.']);
        }

        return redirect()->back()->with(['fail' => 'Unable to add Question.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        return view('Admin.questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        $exams = Exam::all();
        return view('Admin.questions.edit', compact('question', 'exams'));
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
        $question = Question::find($id);
        $question->exam_id = $request->exam_id;
        $question->question = $request->question;
        $question->option_a = $request->option_a;
        $question->option_b = $request->option_b;
        $question->option_c = $request->option_c;
        $question->option_d = $request->option_d;
        $question->answer = $request->answer;
        $question->updated_at = date('Y-m-d H:i:s');

        if ($question->save() ) {
            return redirect()->route('questions.index')->with(['success' => 'Question successfully updated.']);
        }

        return redirect()->back()->with(['fail' => 'Unable to update Question.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::find($id)->delete();
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
