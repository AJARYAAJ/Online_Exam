@extends('Admin.layouts.master')

@section('content')
<div class="content-wrapper" style="padding:25px;background: rgb(190 185 184);">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Assign Exam </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('assign_exams.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Exam ID</th>
            <th>Exam Name</th>
            <th>Created Date</th>
            <th>Updated Date</th>
        </tr>
        <tr>
            <td>{{ $assign_exam->id}}</td>
            <td>{{ $assign_exam->user_id}}</td>
            <td>{{ $assign_exam->user_name}}</td>
            <td>{{ $assign_exam->exam_id}}</td>
            <td>{{ $assign_exam->exam_name}}</td>
            <td>{{ $assign_exam->created_at}}</td>
            <td>{{ $assign_exam->updated_at}}</td>
        </tr>
    </table>

</div>
@endsection
