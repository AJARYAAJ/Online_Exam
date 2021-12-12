@extends('Admin.layouts.master')

@section('content')
<div class="content-wrapper" style="padding:25px;background: rgb(190 185 184);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Edit Exam
                        <a href="{{ route('exams.index') }}" class="btn btn-primary float-right">Back</a>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('exams.update', $exam->id ) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <!-- Exam Name -->
                            <div class="form-group">
                                <label class="pr-3" style="font-weight: 500;" for="exam_name">Exam Name:</label>
                                <input type='text' class="form-control" placeholder="Exam Name" size="30" name='exam_name' value="{{$exam->exam_name}}">
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
