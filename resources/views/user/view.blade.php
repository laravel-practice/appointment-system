<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $row['title'] }}</h5>
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
                        <td>: {{ $row['title'] }}</td>
                    </tr>
                    <tr>
                        <td>Appointment Date</td>
                        <td>: {{ convertDate($row['appointment_date']) }}</td>
                    </tr>
                    <tr>
                        <td>Appointment Time</td>
                        <td>: {{ convertToAmPm($row['appointment_time']) }}</td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td class="descriptionView">: {{ $row['description'] }}</td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
