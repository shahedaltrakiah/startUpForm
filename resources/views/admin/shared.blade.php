@extends('layouts.adminHeader')

@section('adminContent')

<div class="content-header mb-4">
    <h1 class="h3"> <i class="fas fa-share-alt"></i>
        Shared </h1>
</div>

<div class="response-card animate__animated animate__fadeIn">
    <div class="card-body">
        <div class="table-responsive">
            <table id="responsesTable" class="table table-hover text-center">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Start-up Name</th>
                        <th>Comment</th>
                        <th>Date</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($guests as $guest)
                        <tr>
                            <td>{{ $guest->guest->name }}</td>
                            <td>{{ $guest->guest->email }}</td>
                            <td>{{ $guest->startup_name }}</td>
                            <td>
                                <div class="text-truncate" style="max-width: 200px;">
                                    {{ Str::limit($guest->comment_text, 50) }}
                                </div>
                            </td>
                            <td>{{ $guest->created_at->format('Y-m-d') }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-primaryy btn-sm viewCommentBtn" style="background-color: #0d6efd;
                                    color:#ffff;"
                                        data-comment="{{ $guest->comment_text }}" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#viewModal"
                                        title="View">
                                        <i class="fas fa-eye"></i>
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

<!-- View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Full Comment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p id="fullCommentText"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
            "paging": true,       
            "searching": true,    
            "ordering": true,     
            "info": true,         
            "lengthChange": false 
        });

        // Handle View Button Click
        $(".viewCommentBtn").on("click", function() {
            var fullComment = $(this).data("comment"); 
            $("#fullCommentText").text(fullComment); 
        });
    }); 
</script>

@endsection
