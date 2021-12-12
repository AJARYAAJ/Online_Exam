@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper" style="padding:25px;background: rgb(190 185 184);">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add Question</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('questions.index') }}"> Back</a>
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

    <form action="{{ route('questions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row py-4">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Exam Name:</strong>
                    <select class="form-control" name="exam_id">
                        <option value="0">Select Exam</option>
                        @foreach($exams as $exam)
                        <option value="{{ $exam->id }}">{{ $exam->exam_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <strong>Question:</strong>
                    <input type="text" name="question" class="form-control" placeholder="Question">
                </div>

                <div class="form-group">
                    <strong>Option A:</strong>
                    <input type="text" name="option_a" class="form-control" placeholder="Option A">
                </div>

                <div class="form-group">
                    <strong>Option B:</strong>
                    <input type="text" name="option_b" class="form-control" placeholder="Option B">
                </div>

                <div class="form-group">
                    <strong>Option C:</strong>
                    <input type="text" name="option_c" class="form-control" placeholder="Option C">
                </div>

                <div class="form-group">
                    <strong>Option D:</strong>
                    <input type="text" name="option_d" class="form-control" placeholder="Option D">
                </div>

                <div class="form-group">
                    <strong>Answer:</strong>
                    <select class="form-control" name="answer">
                        <option value="A">Option A</option>
                        <option value="B">Option B</option>
                        <option value="C">Option C</option>
                        <option value="D">Option D</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
</div>
@endsection
