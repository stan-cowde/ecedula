<table class="table table-bordered" id="accounts-table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    </thead>
    @foreach($rows as $index => $row)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>
                <a href="" id="user-link" data-toggle="modal" data-target=".bd-example-modal-sm"
                   data-id="{{ $row->id }}">
                    {{ $row->firstname . ' ' . $row->lastname }}
                </a>
            </td>
            <td>{{ $row->username }}</td>
            <td>{{ $row->email }}</td>
            <td>
                <a href="#" class="btn btn-danger" wire:click.prevent="deleteUser({{ $row->id }})"><i
                        class="fas fa-trash"></i></a>
            </td>
        </tr>
    @endforeach
</table>


@section('custom-js')
    <script>
        dataTable = $('#accounts-table').DataTable({
            pageLength: 10,
            sort: true,
        });
    </script>
@endsection
