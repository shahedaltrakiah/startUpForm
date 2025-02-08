@extends('layouts.adminHeader')

@section('adminContent')

<div class="content-header mb-4">
    <h1 class="h3">
        <i class="fa-solid fa-file-pen"></i>
        Form
    </h1>
</div>

<div class="response-card animate__animated animate__fadeIn">
    <div class="card-body">
        <div class="table-responsive">
            <table id="responsesTable" class="table table-hover text-center">
                <thead>
                    <tr>
                        <th>Form Name</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($forms as $form)
                        <tr>
                            <td>{{ $form->name }}</td>
                            <td>{{ $form->description }}</td>
                            <td>{{ $form->created_at->format('Y-m-d') }}</td>
                            <td class="text-center">

                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.viewForm', $form->id) }}"
                                        class="btn btn-primaryy btn-sm" data-bs-toggle="tooltip"
                                        style="background:#0d6efd; color:#ffff;" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $form->id }}"
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
    $(document).ready(function () {
        $('#responsesTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "lengthChange": false
        });
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
                    url: `/admin/form/${formId}`,
                    type: 'DELETE',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }, // CSRF token
                    success: function (form) {
                        Swal.fire({
                            title: "Deleted!",
                            text: form.success,
                            icon: "success",
                            timer: 1500
                        }).then(() => {
                            location.reload(); // Refresh table
                        });
                    },
                    error: function () {
                        Swal.fire({
                            title: "Error!",
                            text: "Could not delete the form.",
                            icon: "error"
                        });
                    }
                });
            }
        });
    });
</script>

@endsection