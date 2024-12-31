<div class="table-responsive">
    <table class="table table-bordered w-100" id="example">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">name</th>
            <th class="text-center">username</th>
            <th class="text-center">Email</th>
            <th class="text-center">Status</th>
        </tr>
        </thead>
       <tbody>
          @forelse($rows as $index => $row)

              <tr>
                  <td>
                      <a href="#" data-bs-toggle="modal" data-bs-target="#userProfileModal">
                          {{ $index + 1 }}
                      </a>
                  </td>
                  <td>{{ ucwords($row->firstname) . ' ' . ucwords($row->lastname) }}</td>
                  <td>{{ ucwords($row->username) }}</td>
                  <td>{{ $row->email }}</td>
                  <td>

                      <div class="d-flex justify-content-around">

                          <button type="button" wire:click="DecisionApplicantRequest('Approved', {{ $row->request_id }})" name="approve_btn" class="btn btn-success">Approved</button>
                          <button type="button" wire:click="DecisionApplicantRequest('rejected', {{ $row->request_id }})" name="dissaprove_btn" class="btn btn-danger">Reject</button>

                      </div>

                  </td>
              </tr>
          @empty

          @endforelse
       </tbody>
    </table>
</div>


@section('custom-js')
    <script>
        //TODO: MAKE THIS SHIT
        document.addEventListener('livewire:init', function () {

            let dataTable = null;

            // Function to initialize DataTables
            function initializeDataTable() {
                dataTable = $('#example').DataTable({
                    responsive: true,
                    pageLength: 10,
                });
            }

            // Function to destroy DataTables
            function destroyDataTable() {
                if (dataTable) {
                    dataTable.destroy();
                    dataTable = null;
                }
            }

            // Initialize DataTables on page load
            initializeDataTable();

            // Reinitialize DataTables after Livewire updates
            Livewire.hook('element.init', () => {
                destroyDataTable(); // Destroy the existing DataTable
                initializeDataTable();
            });
        });
    </script>
@endsection

