@extends('layouts.app')

@section('content')
<style>
    .hidden {
        display: none;
    }
</style>
<div class="container">
    <?php 
        $student_id = session('user_id');
    ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Student Exam Panel') }}
                    <p style="float: right;">Timer :-  <span id="countdown"></span></p>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach ($questions as $question)
                        <div>
                            <h4>Question :- {{$question->question}}</h4>
                            <br>
                            <span>Option A :- {{$question->option_a}}</span><br>
                            <span>Option B :- {{$question->option_b}}</span><br>
                            <span>Option C :- {{$question->option_c}}</span><br>
                            <span>Option D :- {{$question->option_d}}</span><br>
                        </div>
                        <div class="py-4">
                            <form action="{{ url('home/'. $exam_id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" value="{{$question->question}}" name="question">
                                    <input type="hidden" value="{{$question->option_a}}" name="option_a">
                                    <input type="hidden" value="{{$question->option_b}}" name="option_b">
                                    <input type="hidden" value="{{$question->option_c}}" name="option_c">
                                    <input type="hidden" value="{{$question->option_d}}" name="option_d">
                                    <input type="hidden" value="{{$question->answer}}" name="answer">
                                    <input type="hidden" value="{{$student_id}}" name="user_id">
                                    <input type="hidden" value="{{$exam_id}}" name="exam_id">
                                </div>
                                <div class="form-group">
                                    <label>Option A</label>
                                    <input type="checkbox" value="A" name="user_input">

                                    <label style="padding-left: 20px;">Option B</label>
                                    <input type="checkbox" value="B" name="user_input">

                                    <label style="padding-left: 20px;">Option C</label>
                                    <input type="checkbox" value="C" name="user_input">

                                    <label style="padding-left: 20px;">Option D</label>
                                    <input type="checkbox" value="D" name="user_input">
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    @endforeach
                    {!! $questions-> links() !!}
                </div>
                <div >

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    seconds = 300;
    function secondPassed() {
        var minutes = Math.round((seconds - 30)/60),
            remainingSeconds = seconds % 60;

        if (remainingSeconds < 10) {
            remainingSeconds = "0" + remainingSeconds;
        }

        document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;
        if (seconds == 0) {
            clearInterval(countdownTimer);
        //form1 is your form name
        document.form1.submit();
        } else {
            seconds--;
        }
    }
    var countdownTimer = setInterval('secondPassed()', 1000);
</script>
@endsection