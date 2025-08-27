<div class="flex flex-col sm:flex-row items-center w-full">

    <!-- Print Button -->
    <button class="btn btn-primary flex items-center gap-2" wire:click="printReports" target="_blank">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4" viewBox="0 0 20 20">
            <path d="M10 9.25a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 0 0 .75-.75V10a.75.75 0 0 0-.75-.75H10ZM6 13.25a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 0 0 .75-.75V14a.75.75 0 0 0-.75-.75H6ZM8 13.25a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 0 0 .75-.75V14a.75.75 0 0 0-.75-.75H8ZM9.25 14a.75.75 0 0 1 .75-.75h.01a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-.75.75H10a.75.75 0 0 1-.75-.75V14ZM12 11.25a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 0 0 .75-.75V12a.75.75 0 0 0-.75-.75H12ZM12 13.25a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 0 0 .75-.75V14a.75.75 0 0 0-.75-.75H12ZM13.25 12a.75.75 0 0 1 .75-.75h.01a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-.75.75H14a.75.75 0 0 1-.75-.75V12ZM11.25 10.005c0-.417.338-.755.755-.755h2a.755.755 0 1 1 0 1.51h-2a.755.755 0 0 1-.755-.755ZM6.005 11.25a.755.755 0 1 0 0 1.51h4a.755.755 0 1 0 0-1.51h-4Z" />
            <path fill-rule="evenodd" d="M5.75 2a.75.75 0 0 1 .75.75V4h7V2.75a.75.75 0 0 1 1.5 0V4h.25A2.75 2.75 0 0 1 18 6.75v8.5A2.75 2.75 0 0 1 15.25 18H4.75A2.75 2.75 0 0 1 2 15.25v-8.5A2.75 2.75 0 0 1 4.75 4H5V2.75A.75.75 0 0 1 5.75 2Zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75Z" clip-rule="evenodd" />
        </svg>
        Print Reports
    </button>

    <!-- Date Input -->
    <input
        type="text"
        wire:model.lazy="dates"
        name="dates"
        placeholder="Select date range"
        class="input input-bordered input-md w-full sm:w-auto"
    />

</div>

@section('custom-js')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    document.addEventListener('livewire:init', function () {

        let dataTable = null;

        initializeDatepicker();
        initializeDataTable();


        // Function to initialize DataTables
        function initializeDataTable() {
            dataTable = $('#dataTable').DataTable({
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
        // Reinitialize daterangepicker whenever the DOM is updated by Livewire
        function initializeDatepicker() {
            $('input[name="dates"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                // Set Livewire variables
                @this.set('startDate', start.format('YYYY-MM-DD'));
                @this.set('endDate', end.format('YYYY-MM-DD'));
            });
        }

        // Reinitialize DataTables after Livewire updates
        Livewire.hook('element.init', () => {
            destroyDataTable(); // Destroy the existing DataTable
            initializeDataTable();
        });

        // Listen for Livewire's `refresh-page` event
        Livewire.on('refresh-page', () => {
            location.reload();
        });
    });
</script>
@endsection

