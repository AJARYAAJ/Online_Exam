<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Assign_Exam;
use App\Models\Result;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Validator;
date_default_timezone_set('Asia/Kolkata');

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        $exams = Exam::all();
        $questions = Question::all();
        $assign_exams = Assign_Exam::all();
        $results = Result::all();
        return view('home', compact('users', 'exams', 'questions', 'assign_exams', 'results'));
    }

    public function exam(Request $request, $exam_id) {
        $questions = DB::table('questions')
                    ->where('exam_id', $exam_id)
                    ->paginate(1);
        
        return view('viewQuestion')->with(compact(['questions', 'exam_id']));
    }

    public function result(Request $request) {
        $studentResult = Result::all();
        foreach($studentResult as $studentRes){
            if($studentRes->question == $request->question){
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

                $data = Result::find($studentRes->id);
                $data->user_id = $request->user_id;
                $data->user_name = $username;
                $data->exam_id = $request->exam_id;
                $data->exam_name = $studentexam_name;
                $data->question = $request->question;
                $data->option_a = $request->option_a;
                $data->option_b = $request->option_b;
                $data->option_c = $request->option_c;
                $data->option_d = $request->option_d;
                $data->user_input = $request->user_input;
                $data->answer = $request->answer;
                $data->created_at = date('Y-m-d H:i:s');
                $data->updated_at = date('Y-m-d H:i:s');

                $data->save();

                return redirect()->back();

            } else{
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

                $result = new Result();
                $result->user_id = $request->user_id;
                $result->user_name = $username;
                $result->exam_id = $request->exam_id;
                $result->exam_name = $studentexam_name;
                $result->question = $request->question;
                $result->option_a = $request->option_a;
                $result->option_b = $request->option_b;
                $result->option_c = $request->option_c;
                $result->option_d = $request->option_d;
                $result->user_input = $request->user_input;
                $result->answer = $request->answer;
                $result->created_at = date('Y-m-d H:i:s');
                $result->updated_at = date('Y-m-d H:i:s');

                $result->save();

                return redirect()->back();
            }
        }
    }

    public function showResult($exam_id) {
        $results = DB::table('results')
                    ->where('exam_id', $exam_id)
                    ->get();

        return view('studentResult')->with(compact(['results', 'exam_id']));
    }
}
