@extends('Admin.layouts.master')

@section('content')
<div class="content-wrapper" style="padding:25px;background: rgb(190 185 184);">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Exam </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('exams.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Exam Name</th>
            <th>Created Date</th>
            <th>Updated Date</th>
        </tr>
        <tr>
            <td>{{ $exam->id}}</td>
            <td>{{ $exam->exam_name}}</td>
            <td>{{ $exam->created_at}}</td>
            <td>{{ $exam->updated_at}}</td>
        </tr>
    </table>

</div>
@endsection
