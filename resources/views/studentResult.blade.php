@extends('layouts.app')

@section('content')
<div class="content-wrapper" style="padding:25px;background: rgb(190 185 184);">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Exam Result </h2>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Student Name</th>
            <th>Exam Name</th>
            <th>Question</th>
            <th>Option A</th>
            <th>Option B</th>
            <th>Option C</th>
            <th>Option D</th>
            <th>Student Ans.</th>
            <th>Result</th>
        </tr>
        @foreach ($results as $item)
        <tr>
            <td>{{ $item->id}}</td>
            <td>{{ $item->user_name}}</td>
            <td>{{ $item->exam_name}}</td>
            <td>{{ $item->question}}</td>
            <td>{{ $item->option_a}}</td>
            <td>{{ $item->option_b}}</td>
            <td>{{ $item->option_c}}</td>
            <td>{{ $item->option_d}}</td>
            <td>{{ $item->user_input}}</td>
            <td>
                @if ($item->answer == $item->user_input)
                    Correct
                @else
                    Incorrect
                @endif
            </td>
        </tr>
        @endforeach
    </table>

</div>
@endsection
