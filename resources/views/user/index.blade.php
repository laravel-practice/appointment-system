@extends('user.layouts.layout')

@section('content')
    <div class="appointment-wrapper">
        <div class="profile-section">

            <div><b>{{ $data['user']['name'] }}</b></div>
            <div>{{ $data['user']['email'] }}</div>
            <div>{{ $data['user']['mobile'] }}</div>
            <div>{{ $data['user']['address'] }}</div>
        </div>

        <div class="appointment__form">
            <h4>List of Appointment</h4>
            <table class="table table-striped tableCustom">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @if(count($data['appointment']))
                    @foreach($data['appointment'] as $key => $row)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $row['title'] }}</td>
                        <td>{{ convertDate($row['appointment_date']) }}</td>
                        <td>{{ convertToAmPm($row['appointment_time']) }}</td>
                        <td>  {{ \Illuminate\Support\Str::limit($row['description'],50)  }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$row['id']}}">
                                View
                            </button>
                        @include('user.view')
                        </td>
                    </tr>
                    @endforeach
                 @else
                    <tr><td colspan="5">No Record Found!</td></tr>
                @endif
                </tbody>
            </table>
            {{ $data['appointment']->links() }}
        </div>
    </div>
@endsection

@push('js')

@endpush
