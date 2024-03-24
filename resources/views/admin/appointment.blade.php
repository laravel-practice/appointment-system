@extends('admin.layouts.layout')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-6">
            <h2> Management</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="">panel</a>
                </li>

                <li class="breadcrumb-item">
                    <strong>hello</strong>
                </li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>News</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="login-form login-form--full">
                            <div class="table-responsive">
                                <table class="table table-bordered appointmentTable table-hover" style="width: 99.9%">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User Name</th>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Time</th>
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

    </div>

@endsection

@push('js')
    <script>
        $(function () {
            $('.appointmentTable').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 25,
                order: [[0, 'desc']],
                ajax: "{{ route('admin.appointment.data') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'users.name', name: 'users.name'},
                    {data: 'title', name: 'title'},
                    {data: 'appointment_date', name: 'appointment_date'},
                    {data: 'appointment_time', name: 'appointment_time'},
                    {data: 'action', name: 'action', sortable: false, searchable: false},

                ]
            });
        });

        $(document).ready(function() {
            $(document).on('click','.showData',function (){
                var id = $(this).data('id');
                $.ajax({
                    url: '{{ route('admin.appointment.load-data') }}',
                    data:{
                        id: id,
                    },
                    success: function(response) {
                        if (response.html) {
                            $('.dataWrapperAppointment').empty().html(response.html);
                            $('#exampleModalAppointment').modal('show');
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
