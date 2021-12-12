@extends('Admin.layouts.master')

@section('content')
<div class="content-wrapper" style="padding:25px;background: rgb(190 185 184);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Edit Question
                        <a href="{{ route('questions.index') }}" class="btn btn-primary float-right">Back</a>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('questions.update', $question->id ) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <!-- Exam ID -->
                            <div class="form-group">
                            <?php $selectedExamvalue=$question['exam_id'] ?>
                                <label style="font-weight: 500;" for="exam_id">Exam:</label>
                                <select class="form-control" name="exam_id">
                                    <option value="0">Select Exam</option>
                                    @foreach($exams as $exam)
                                    <option value="{{ $exam->id }}" {{ $exam->id == $selectedExamvalue ? 'selected="selected"' : '' }}>{{ $exam->exam_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Question -->
                            <div class="form-group">
                                <label class="pr-3" style="font-weight: 500;" for="Question">Question:</label>
                                <input type='text' class="form-control" placeholder="Question" size="30" name='question' value="{{$question->question}}">
                            </div>

                            <!-- Option A -->
                            <div class="form-group">
                                <label class="pr-3" style="font-weight: 500;" for="option_a">Option A:</label>
                                <input type='text' class="form-control" placeholder="Option A" size="30" name='option_a' value="{{$question->option_a}}">
                            </div>

                            <!-- Option B -->
                            <div class="form-group">
                                <label class="pr-3" style="font-weight: 500;" for="option_a">Option B:</label>
                                <input type='text' class="form-control" placeholder="Option B" size="30" name='option_b' value="{{$question->option_b}}">
                            </div>

                            <!-- Option C -->
                            <div class="form-group">
                                <label class="pr-3" style="font-weight: 500;" for="option_a">Option C:</label>
                                <input type='text' class="form-control" placeholder="Option C" size="30" name='option_c' value="{{$question->option_c}}">
                            </div>

                            <!-- Option D -->
                            <div class="form-group">
                                <label class="pr-3" style="font-weight: 500;" for="option_a">Option D:</label>
                                <input type='text' class="form-control" placeholder="Option D" size="30" name='option_d' value="{{$question->option_d}}">
                            </div>

                            <!-- Answer -->
                            <div class="form-group">
                                <label class="pr-3" style="font-weight: 500;" for="answer">Answer:</label>
                                <input type='text' class="form-control" placeholder="Answer" size="30" name='answer' value="{{$question->answer}}">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
