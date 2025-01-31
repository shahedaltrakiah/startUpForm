@extends('layouts.adminHeader')

@section('adminContent')

<div class="content-header">
    <h1 class="h3 mb-4">
        Dashboard Overview
    </h1>
</div>

<!-- Statistics Cards -->
<div class="row g-4 mb-4">
    <div class="col-12 col-md-6 col-xl-3">
        <div class="response-card h-100 animate__animated animate__fadeIn">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Total Responses</h6>
                        <h2 class="mb-0">2,450</h2>
                    </div>
                    <div class="bg-primary bg-opacity-10 p-3 rounded">
                        <i class="fas fa-comments text-primary fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-xl-3">
        <div class="response-card h-100 animate__animated animate__fadeIn animate__delay-1s">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Active StartUp</h6>
                        <h2 class="mb-0">1,280</h2>
                    </div>
                    <div class="bg-success bg-opacity-10 p-3 rounded">
                        <i class="fa-solid fa-building text-success fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-xl-3">
        <div class="response-card h-100 animate__animated animate__fadeIn animate__delay-2s">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Shared Content</h6>
                        <h2 class="mb-0">865</h2>
                    </div>
                    <div class="bg-warning bg-opacity-10 p-3 rounded">
                        <i class="fas fa-share-alt text-warning fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-xl-3">
        <div class="response-card h-100 animate__animated animate__fadeIn animate__delay-3s">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Response Rate</h6>
                        <h2 class="mb-0">92%</h2>
                    </div>
                    <div class="bg-info bg-opacity-10 p-3 rounded">
                        <i class="fas fa-chart-line text-info fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity Table -->
<div class="response-card animate__animated animate__fadeIn animate__delay-4s">
    <div class="card-header">
        <h5 class="card-title mb-0">Recent Activity</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Response ID</th>
                        <th>StartUp Name</th>
                        <th>Email</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection