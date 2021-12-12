@extends('Admin.layouts.master')

@section('content')
<div class="content-wrapper" style="padding:25px;background: rgb(190 185 184);">
    <div>
        Student Data
        <a href="{{ route('showRegister') }}" class="btn btn-primary float-right">Add Student</a>
    </div>

    <!-- Deleting Model Start -->
    <div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Confirmation</h2>
                </div>
                <div class="modal-body">
                    <h4 align="center" style="margin:0;">Are you sure you want to remove this?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Deleting Model End -->

    <div class="table-responsive">
        <!--Table-->
        <table class="table table-striped w-auto" id="student_list">
            <!--Table head-->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
        <!--Table-->
    </div>
    
    <script>
        $(document).ready(function(){
            $('#student_list').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('students') }}",
                },
                columns: [
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'role',
                        name: 'role'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    }
                ]
            });

            var del_id;

            // Delete action
            $(document).on('click', '.delete', function(){
                del_id = $(this).attr('id');
                $('#deleteModal').modal('show');
            });

            $('#ok_button').click(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type:'DELETE',
                    url:"students/destroy/" + del_id,
                });
                $.ajax({
                    beforeSend:function(){
                        $('#ok_button').text('Deleting...');
                    },
                    success:function(data)
                    {
                        setTimeout(function(){
                            $('#deleteModal').modal('hide');
                            $('#student_list').DataTable().ajax.reload();
                        }, 1000);
                    }
                });
            });

        });
    </script>
</div>
@endsection