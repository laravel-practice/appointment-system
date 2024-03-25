
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">{{ $appointment['title'] }}</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Value</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Title</td>
            <td>{{ $appointment['title'] }}</td>
        </tr>
        <tr>
            <td>User Name</td>
            <td>{{ $appointment->user->name }}</td>
        </tr>
        <tr>
            <td>Appointment Date</td>
            <td>{{ convertDate($appointment['appointment_date']) }}</td>
        </tr>
        <tr>
            <td>Appointment Time</td>
            <td>{{ convertToAmPm($appointment['appointment_time']) }}</td>
        </tr>
        <tr>
            <td>Description</td>
            <td class="descriptionView">{{ $appointment['description'] }}</td>
        </tr>


        </tbody>
    </table>
</div>
