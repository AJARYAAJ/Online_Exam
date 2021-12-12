@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper" style="padding:25px;background: rgb(190 185 184);">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add Assign Exam</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('assign_exams.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('assign_exams.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row py-4">
            <div class="form-group">
                <strong>Student Name:</strong>
                <select class="form-control" name="user_id">
                    <option value="0">Select Student</option>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <strong>Exam Name:</strong>
                <select class="form-control" name="exam_id">
                    <option value="0">Select Exam</option>
                    @foreach($exams as $exam)
                    <option value="{{ $exam->id }}">{{ $exam->exam_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
</div>
@endsection
