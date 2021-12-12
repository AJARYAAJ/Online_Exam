@extends('Admin.layouts.master')

@section('content')
<div class="content-wrapper" style="padding:25px;background: rgb(190 185 184);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Edit Assign Exam
                        <a href="{{ route('assign_exams.index') }}" class="btn btn-primary float-right">Back</a>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('assign_exams.update', $assign_exam->id ) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <!-- Exam ID -->
                            <div class="form-group">
                            <?php $selectedUservalue=$assign_exam['user_id'] ?>
                                <label style="font-weight: 500;" for="user_id">Student:</label>
                                <select class="form-control" name="user_id">
                                    <option value="0">Select Student</option>
                                    @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $user->id == $selectedUservalue ? 'selected="selected"' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Exam ID -->
                            <div class="form-group">
                            <?php $selectedExamvalue=$assign_exam['exam_id'] ?>
                                <label style="font-weight: 500;" for="exam_id">Exam:</label>
                                <select class="form-control" name="exam_id">
                                    <option value="0">Select Exam</option>
                                    @foreach($exams as $exam)
                                    <option value="{{ $exam->id }}" {{ $exam->id == $selectedExamvalue ? 'selected="selected"' : '' }}>{{ $exam->exam_name }}</option>
                                    @endforeach
                                </select>
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
