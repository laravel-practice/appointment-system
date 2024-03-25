
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">{{ $user['name'] }}</h5>
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
            <td>Name</td>
            <td>{{ $user['name'] }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{ $user['email'] }}</td>
        </tr>
        <tr>
            <td>Mobile</td>
            <td>{{ $user['mobile'] }}</td>
        </tr>
        <tr>
            <td>Create At</td>
            <td class="descriptionView">{{ convertDate($user['created_at']) }}</td>
        </tr>
        <tr>
            <td>Address</td>
            <td class="descriptionView">{{ $user['address'] }}</td>
        </tr>

        </tbody>
    </table>
</div>
