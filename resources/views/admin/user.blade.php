@extends('admin.layouts.layout')

@section('content')
        <div class="breadcrumbs">
            <h2> User </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>

                <li class="breadcrumb-item">
                    <strong>Users</strong>
                </li>
            </ol>
        </div>

        <div class="tableWrapper">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Users</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="login-form login-form--full">
                            <div class="table-responsive">
                                <table class="table table-bordered userTable table-hover" style="width: 99.9%">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.common.modal-box')


@endsection

@push('js')
    <script>
        $(function () {
            $('.userTable').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 25,
                order: [[0, 'desc']],
                ajax: "{{ route('admin.user.data') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'mobile', name: 'mobile'},
                    {data: 'created_at', name: 'created_at', sortable: false, searchable: false},
                    {data: 'action', name: 'action', sortable: false, searchable: false},

                ]
            });
        });

        $(document).ready(function() {
            $(document).on('click','.showData',function (){
                var id = $(this).data('id');
                $.ajax({
                    url: '{{ route('admin.user.load-data') }}',
                    data:{
                        id: id,
                    },
                    success: function(response) {
                        if (response.html) {
                            $('.dataWrapperData').empty().html(response.html);
                            $('#exampleModalData').modal('show');
                        } else {
                            toastr.error('No Record found.');
                        }
                    },
                    error: function(xhr, status, error) {
                        toastr.error('Something went wrong. Please try again later.');
                    }
                });
            });
        })


    </script>
@endpush
