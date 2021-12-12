@extends('Admin.layouts.master')

@section('content')
<div class="content-wrapper" style="padding:25px;background: rgb(190 185 184);">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Student</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('students') }}"> Back</a>
            </div>
        </div>
    </div>

    <header class="text-center py-4" style="font-size: 20px; color: white;">Student Information</header>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Created Date</th>
            <th>Updated Date</th>
        </tr>
        <tr>
            <td>{{ $students->id}}</td>
            <td>{{ $students->name}}</td>
            <td>{{ $students->email}}</td>
            <td>{{ $students->role}}</td>
            <td>{{ $students->created_at}}</td>
            <td>{{ $students->updated_at}}</td>
        </tr>
    </table>

    @foreach ($assign_exams as $item)
        @if($item->user_id == $students->id)
        <header class="text-center py-4" style="font-size: 20px; color: white;">Assigned Student Exam</header>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Exam Name</th>
                <th>Created Date</th>
                <th>Updated Date</th>
            </tr>
            <tr>
                <td>{{ $item->id}}</td>
                <td><a href="#result" data-toggle="modal" data-target="#result">{{ $item->exam_name}}</a></td>
                <td>{{ $item->created_at}}</td>
                <td>{{ $item->updated_at}}</td>
            </tr>
        </table>
        @endif

        @foreach ($results as $item2)
            @if ($item2->user_id == $students->id && $item2->exam_id == $item->id)
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Student Name</th>
                        <th>Exam Name</th>
                        <th>Question</th>
                        <th>Option A</th>
                        <th>Option B</th>
                        <th>Option C</th>
                        <th>Option D</th>
                        <th>Student Ans.</th>
                        <th>Answer</th>
                        <th>Correct/Incorrect</th>
                    </tr>
                    <tr>
                        <td>{{ $item2->id}}</td>
                        <td>{{ $item2->user_name}}</td>
                        <td>{{ $item2->exam_name}}</td>
                        <td>{{ $item2->question}}</td>
                        <td>{{ $item2->option_a}}</td>
                        <td>{{ $item2->option_b}}</td>
                        <td>{{ $item2->option_c}}</td>
                        <td>{{ $item2->option_d}}</td>
                        <td>{{ $item2->user_input}}</td>
                        <td>{{ $item2->answer}}</td>
                        <td>
                            @if ($item2->answer == $item2->user_input)
                                Correct
                            @else
                                Incorrect
                            @endif
                        </td>
                    </tr>
                </table>
            @endif
        @endforeach
            {{-- @foreach ($results as $item2)
            @if ($item2->user_id == $students->id && $item2->exam_id == $item->id)
        <div class="modal fade" id="result" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Student Result Exam Wise</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Student Name</th>
                                <th>Exam Name</th>
                                <th>Question</th>
                                <th>Option A</th>
                                <th>Option B</th>
                                <th>Option C</th>
                                <th>Option D</th>
                                <th>Student Ans.</th>
                                <th>Answer</th>
                                <th>Correct/Incorrect</th>
                            </tr>
                            <tr>
                                <td>{{ $item2->id}}</td>
                                <td>{{ $item2->user_name}}</td>
                                <td>{{ $item2->exam_name}}</td>
                                <td>{{ $item2->question}}</td>
                                <td>{{ $item2->option_a}}</td>
                                <td>{{ $item2->option_b}}</td>
                                <td>{{ $item2->option_c}}</td>
                                <td>{{ $item2->option_d}}</td>
                                <td>{{ $item2->user_input}}</td>
                                <td>{{ $item2->answer}}</td>
                                <td>
                                    @if ($item2->answer == $item2->user_input)
                                        Correct
                                    @else
                                        Incorrect
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
            @endif
        @endforeach --}}
    @endforeach
</div>
@endsection
