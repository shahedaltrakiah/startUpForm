@extends('layouts.adminHeader')

@section('adminContent')

<div class="content-header mb-4">
    <h1 class="h3"> <i class="fas fa-list"></i>
        Responses</h1>
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
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th>Startup</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="text-center">
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
                                <a href="{{ route('admin.viewResponse') }}" class="btn btn-primary btn-sm"
                                    data-bs-toggle="tooltip" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <button class="btn btn-info btn-sm" data-bs-toggle="tooltip" title="Share">
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

<!-- View Response Modal -->
<div class="modal fade" id="viewResponseModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Response Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label fw-bold">Startup Name</label>
                    <p>TechVision Inc.</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Email</label>
                    <p>contact@techvision.com</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Comment</label>
                    <p>Interested in exploring potential collaboration opportunities. Our team has developed innovative
                        solutions in AI and we'd love to discuss possible partnerships.</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Submission Date</label>
                    <p>2024-01-29 14:30:00</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Mark as Contacted</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script>
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>

@endsection