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
                        <h2 class="mb-0">{{ $totalResponses }}</h2>
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
                        <h6 class="text-muted mb-2">StartUp</h6>
                        <h2 class="mb-0">{{ $totalStartups }}</h2>
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
                        <h6 class="text-muted mb-2">Shared Response</h6>
                        <h2 class="mb-0">{{ $sharedResponses }}</h2>
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
                        <h6 class="text-muted mb-2"> Approved Response</h6>
                        <h2 class="mb-0">{{ $approveResponse }}</h2>
                    </div>
                    <div class="bg-info bg-opacity-10 p-3 rounded">
                        <i class="fa-solid fa-thumbs-up text-info fa-2x"></i>
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
                        <th>Startup</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentActivities as $activity)
                        <tr>
                            <td>{{ $activity->startup_name }}</td>
                            <td>{{ $activity->startup_email }}</td>
                            <td>{{ $activity->startup_phoneNumber }}</td>
                            <td>
                                @if($activity->status == 'pending')
                                    <span class="badge badge-warning">{{ strtoupper($activity->status) }}</span>
                                @elseif($activity->status == 'approved')
                                    <span class="badge badge-success">{{ strtoupper($activity->status) }}</span>
                                @elseif($activity->status == 'rejected')
                                    <span class="badge badge-danger">{{ strtoupper($activity->status) }}</span>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($activity->submission_date)->format('Y-m-d H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection