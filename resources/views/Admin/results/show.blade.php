@extends('Admin.layouts.master')

@section('content')
<div class="content-wrapper" style="padding:25px;background: rgb(190 185 184);">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Result </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('results.index') }}"> Back</a>
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
            <th>Question</th>
            <th>Option A</th>
            <th>Option B</th>
            <th>Option C</th>
            <th>Option D</th>
            <th>Student Ans.</th>
            <th>Answer</th>
            <th>Created Date</th>
            <th>Updated Date</th>
        </tr>
        <tr>
            <td>{{ $result->id }}</td>
            <td>{{ $result->user_id }}</td>
            <td>{{ $result->user_name }}</td>
            <td>{{ $result->exam_id }}</td>
            <td>{{ $result->exam_name }}</td>
            <td>{{ $result->question }}</td>
            <td>{{ $result->option_a }}</td>
            <td>{{ $result->option_b }}</td>
            <td>{{ $result->option_c }}</td>
            <td>{{ $result->option_d }}</td>
            <td>{{ $result->user_input }}</td>
            <td>{{ $result->answer }}</td>
            <td>{{ $result->created_at }}</td>
            <td>{{ $result->updated_at }}</td>
        </tr>
    </table>

</div>
@endsection
