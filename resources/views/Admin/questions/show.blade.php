@extends('Admin.layouts.master')

@section('content')
<div class="content-wrapper" style="padding:25px;background: rgb(190 185 184);">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Question </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('questions.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Exam ID</th>
            <th>Question</th>
            <th>Option A</th>
            <th>Option B</th>
            <th>Option C</th>
            <th>Option D</th>
            <th>Answer</th>
            <th>Created Date</th>
            <th>Updated Date</th>
        </tr>
        <tr>
            <td>{{ $question->id }}</td>
            <td>{{ $question->exam_id }}</td>
            <td>{{ $question->question }}</td>
            <td>{{ $question->option_a }}</td>
            <td>{{ $question->option_b }}</td>
            <td>{{ $question->option_c }}</td>
            <td>{{ $question->option_d }}</td>
            <td>{{ $question->answer }}</td>
            <td>{{ $question->created_at }}</td>
            <td>{{ $question->updated_at }}</td>
        </tr>
    </table>

</div>
@endsection
