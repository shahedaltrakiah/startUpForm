@extends('layouts.adminHeader')

@section('adminContent')

<div class="content-header">
    <h1 class="h3 mb-2"> <i class="fas fa-cog me-2"></i>Admin Settings
    </h1>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card" style="width:999px;">
            <div class="card-body">
                <form id="passwordChangeForm">
                    <div class="mb-3">
                        <label for="currentPassword" class="form-label">Current Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="currentPassword" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">New Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                            <input type="password" class="form-control" id="newPassword" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm New Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                            <input type="password" class="form-control" id="confirmPassword" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-save me-2"></i>Change Password
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection