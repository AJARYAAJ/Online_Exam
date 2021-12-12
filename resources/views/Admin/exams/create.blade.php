@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper" style="padding:25px;background: rgb(190 185 184);">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add Exam</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('exams.index') }}"> Back</a>
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

    <form action="{{ route('exams.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row py-4">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Exam Name:</strong>
                    <input type="text" name="exam_name" class="form-control" placeholder="Exam Name">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
</div>
@endsection
