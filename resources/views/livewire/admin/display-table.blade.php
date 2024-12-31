<div class="table-responsive">
    <table class="table table-bordered w-100" id="display-table">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">name</th>
            <th class="text-center">username</th>
            <th class="text-center">Email</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rows as $index => $row)
            <tr>
                <td>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#userProfileModal">
                        {{ $index + 1 }}
                    </a>
                </td>
                <td>{{ ucwords($row->firstname) . ' ' . ucwords($row->lastname) }}</td>
                <td>{{ ucwords($row->username) }}</td>
                <td>{{ $row->email }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>



@section('custom-js')
    <script>
        dataTable = $('#display-table').DataTable({
            responsive: true,
            pageLength: 10,
            sort: true,
        });
    </script>
@endsection
