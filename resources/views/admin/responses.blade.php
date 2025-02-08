@extends('layouts.adminHeader')

@section('adminContent')

<div class="content-header mb-4">
    <h1 class="h3"><i class="fas fa-list"></i> Responses</h1>
    <button id="exportBtn" class="btn btn-success"><i class="fas fa-file-export me-2"></i>Export</button>
</div>

<div class="response-card animate__animated animate__fadeIn">
    <div class="card-body">
        <div class="table-responsive">
            <table id="responsesTable" class="table table-hover text-center">
                <thead>
                    <tr>
                        <th>Startup</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Comment</th>
                        <th>Date</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($responses as $response)
                        <tr data-id="{{ $response->id }}">
                            <td>{{ $response->startup_name }}</td>
                            <td>{{ $response->startup_email }}</td>
                            <td>{{ $response->startup_phoneNumber }}</td>
                            <td>
                                <div class="text-truncate" style="max-width: 200px;">
                                    {{ Str::limit($response->comment, 50) }}
                                </div>
                            </td>
                            <td>{{ $response->created_at->format('Y-m-d') }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.viewResponse', $response->id) }}"
                                        class="btn btn-primaryy btn-sm" data-bs-toggle="tooltip"
                                        style="background:#0d6efd; color:#ffff;" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <button class="btn btn-info btn-sm share-btn" data-id="{{ $response->id }}"
                                        data-bs-toggle="tooltip" title="Share">
                                        <i class="fas fa-share"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $response->id }}"
                                        data-bs-toggle="tooltip" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Share Link Modal -->
<div class="modal fade" id="shareModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Share Response</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control" id="shareLink" readonly>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="copyLinkBtn">Copy Link</button>
            </div>
        </div>
    </div>
</div>


<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<!-- jQuery (Required for DataTables) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

<script>
    // Initialize DataTable
    $(document).ready(function() {
        $('#responsesTable').DataTable({
            "paging": true,       // Enable pagination
            "searching": true,    // Enable searching
            "ordering": true,     // Enable sorting
            "info": true,         // Show information about the table
            "lengthChange": false // Disable changing page length
        });
    });

    // Export table as Excel without the Actions column
    $('#exportBtn').click(function () {
        let table = document.getElementById("responsesTable");
        let clonedTable = table.cloneNode(true);
        let actionIndex = 4; // The index of the Actions column

        for (let row of clonedTable.rows) {
            row.deleteCell(actionIndex);
        }

        let workbook = XLSX.utils.table_to_book(clonedTable, { sheet: "Responses" });
        XLSX.writeFile(workbook, "responses.xlsx");
    });

    // DELETE BUTTON WITH SWEETALERT CONFIRMATION
    $(document).on('click', '.delete-btn', function () {
        let responseId = $(this).data('id');

        Swal.fire({
            title: "Are you sure?",
            text: "This action cannot be undone!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/admin/response/${responseId}`,
                    type: 'DELETE',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }, // CSRF token
                    success: function (response) {
                        Swal.fire({
                            title: "Deleted!",
                            text: response.success,
                            icon: "success",
                            timer: 1500
                        }).then(() => {
                            location.reload(); // Refresh table
                        });
                    },
                    error: function () {
                        Swal.fire({
                            title: "Error!",
                            text: "Could not delete the response.",
                            icon: "error"
                        });
                    }
                });
            }
        });
    });

    // SHARE BUTTON FUNCTIONALITY
    $(document).on('click', '.share-btn', function () {
        let responseId = $(this).data('id');

        // Assuming you're generating the share link based on the response's ID
        let shareLink = `http://127.0.0.1:8000/admin/sharedRespone/${responseId}`; // Modify this as needed to generate the correct share URL

        // Populate the input field with the share link
        $('#shareLink').val(shareLink);

        // Show the share modal
        $('#shareModal').modal('show');
    });

    // Copy link functionality
    $('#copyLinkBtn').click(function () {
        let shareLinkInput = $('#shareLink');
        shareLinkInput.select();
        document.execCommand('copy'); // Copy the link to clipboard

        // Show confirmation that the link is copied
        Swal.fire({
            title: 'Link Copied!',
            text: 'You can now share this link.',
            icon: 'success',
            timer: 1500
        });
    });
</script>



@endsection