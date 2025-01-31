@extends('layouts.adminHeader')

@section('adminContent')

<div class="content-header mb-4">
    <h1 class="h3"> <i class="fas fa-list"></i> Responses</h1>
    <div class="d-flex gap-3">
        <button class="btn btn-success">
            <i class="fas fa-file-export me-2"></i>Export
        </button>
    </div>
</div>

<!-- Responses Table -->
<div class="response-card animate__animated animate__fadeIn">
    <div class="card-body">
        <div class="table-responsive">
            <table id="responsesTable" class="table table-hover text-center">
                <thead>
                    <tr>
                        <th>Startup</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Future Labs</td>
                        <td>info@futurelabs.io</td>
                        <td>
                            <div class="text-truncate" style="max-width: 200px;">
                                Looking forward to discussing our innovative solutions...
                            </div>
                        </td>
                        <td>2024-01-28</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.viewResponse') }}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <button class="btn btn-info btn-sm share-btn" data-link="https://example.com/share/123" data-bs-toggle="tooltip" title="Share">
                                    <i class="fas fa-share"></i>
                                </button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Share Link Modal -->
<div class="modal fade" id="shareModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Share Response</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <label class="form-label">Shareable Link</label>
                <input type="text" class="form-control" id="shareLink" readonly>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="copyLinkBtn">Copy Link</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        $('#responsesTable').DataTable();
    });

    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Share button functionality
    $(document).on('click', '.share-btn', function() {
        let link = $(this).data('link');
        $('#shareLink').val(link);
        $('#shareModal').modal('show');
    });

    $('#copyLinkBtn').click(function() {
        let copyText = document.getElementById("shareLink");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
        alert("Copied: " + copyText.value);
    });
</script>

@endsection
