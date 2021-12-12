@extends('layouts.app')

@section('content')
<div class="container">
    <?php 
        $student_id = session('user_id');
    ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach ($assign_exams as $item)
                        @if ($item->user_id == $student_id)
                            <h6> Assigned Exams : - {{ $item->exam_name }} 
                                {{-- @foreach ($results as $result) --}}
                                    {{-- /@if ($result->user_id == $item->user_id && $result->exam_id == $item->exam_id) --}}
                                        <span style="float: right; padding-left:30px;">End Exam : - 
                                            <a href="home/result/{{$item->exam_id}}">View AnswerSheet</a>
                                        </span>
                                    {{-- @else --}}
                                        <span style="float: right;">Start Exam : - 
                                            <a href="home/{{$item->exam_id}}">Start</a>
                                        </span>
                                    {{-- @endif --}}
                                {{-- @endforeach --}}
                            </h6>
                        @endif
                    @endforeach
                    {{-- {{ __('You are logged in!') }} --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
