@extends('Admin.layouts.master')

@section('content')
<div class="content-wrapper" style="padding:25px;background: rgb(190 185 184);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Edit Student Profile
                        <a href="{{ route('students') }}" class="btn btn-primary float-right">Back</a>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('students.update', $students->id ) }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <!-- Name -->
                            <div class="form-group">
                                <label class="pr-3" style="font-weight: 500;" for="name">Name:</label>
                                <input type='text' class="form-control" placeholder="Name" size="30" name='name' value="{{$students->name}}">
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label class="pr-3" style="font-weight: 500;" for="email">Email:</label>
                                <input type='email' class="form-control" placeholder="Email" size="30" name='email' value="{{$students->email}}">
                            </div>
                            
                            <!-- Role -->
                            <div class="form-group">
                                <label class="pr-3" style="font-weight: 500;" for="role">Role:</label>
                                <input type='text' class="form-control" placeholder="Role" size="30" name='role' value="{{$students->role}}">
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
