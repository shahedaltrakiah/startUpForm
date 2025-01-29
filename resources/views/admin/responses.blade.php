@extends('layouts.adminHeader')

@section('adminContent')

<div class="content-header mb-4">
    <h1 class="h3">Responses</h1>
    <div class="d-flex gap-3">
        <div class="search-bar">
            <input type="text" class="search-input" placeholder="Search responses...">
            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
        </div>
        <button class="btn btn-success">
            <i class="fas fa-file-export me-2"></i>Export
        </button>
    </div>
</div>

<!-- Filters Section -->
<div class="response-card mb-4 animate__animated animate__fadeIn">
    <div class="card-body">
        <div class="row g-3">
            <div class="col-12 col-md-3">
                <label class="form-label">Date Range</label>
                <select class="form-select">
                    <option>Last 7 days</option>
                    <option>Last 30 days</option>
                    <option>Last 3 months</option>
                    <option>Custom range</option>
                </select>
            </div>
            <div class="col-12 col-md-3">
                <label class="form-label">Status</label>
                <select class="form-select">
                    <option>All</option>
                    <option>New</option>
                    <option>Contacted</option>
                    <option>Archived</option>
                </select>
            </div>
            <div class="col-12 col-md-3">
                <label class="form-label">Sort By</label>
                <select class="form-select">
                    <option>Newest First</option>
                    <option>Oldest First</option>
                    <option>Company Name A-Z</option>
                    <option>Company Name Z-A</option>
                </select>
            </div>
            <div class="col-12 col-md-3 d-flex align-items-end">
                <button class="btn btn-primary w-100">
                    <i class="fas fa-filter me-2"></i>Apply Filters
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Responses Table -->
<div class="response-card animate__animated animate__fadeIn">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>
                        </th>
                        <th>Startup Name</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="checkbox" class="form-check-input" style="border: 3px solid #4F46E5;">
                        </td>
                        <td>TechVision Inc.</td>
                        <td>contact@techvision.com</td>
                        <td>
                            <div class="text-truncate" style="max-width: 200px;">
                                Interested in exploring potential collaboration opportunities...
                            </div>
                        </td>
                        <td>2024-01-29</td>
                        <td><span class="badge bg-success">New</span></td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-primary btn-sm" data-bs-toggle="tooltip" title="View">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-info btn-sm" data-bs-toggle="tooltip" title="Share">
                                    <i class="fas fa-share"></i>
                                </button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <input type="checkbox" class="form-check-input" style="border: 3px solid #4F46E5;">
                        </td>
                        <td>Future Labs</td>
                        <td>info@futurelabs.io</td>
                        <td>
                            <div class="text-truncate" style="max-width: 200px;">
                                Looking forward to discussing our innovative solutions...
                            </div>
                        </td>
                        <td>2024-01-28</td>
                        <td><span class="badge bg-warning">Contacted</span></td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-primary btn-sm" data-bs-toggle="tooltip" title="View">
                                    <i class="fas fa-eye"></i>
                                </button>
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

        <!-- Pagination -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div class="text-muted">
                Showing 1 to 2 of 50 entries
            </div>
            <nav>
                <ul class="pagination mb-0">
                    <li class="page-item disabled">
                        <a class="page-link" href="#"><i class="fas fa-chevron-left"></i></a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                    </li>
                </ul>
            </nav>
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