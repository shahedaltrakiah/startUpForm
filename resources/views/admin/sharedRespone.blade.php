@extends('layouts.adminHeader')

@section('adminContent')

<!-- Header Section -->
<div class="content-header mb-4">
    <h1 class="h3">Name of Startup</h1>
</div>

<!-- Response Sections -->
<div class="row">

    <!-- Action Buttons -->
    <div class="d-flex justify-content-between mb-4">
        <div class="d-flex gap-2">
            <button class="btn btn-outline-primary">
            <i class="fa-solid fa-plus"></i> Add Comment
            </button>
        </div>
    </div>
    <div class="col-12">
        <!-- Ideation Section -->
        <div class="response-card mb-4 animate__animated animate__fadeIn">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-lightbulb text-warning me-2"></i>
                    Ideation
                </h5>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-12">
                        <label class="form-label text-muted">Problem Description</label>
                        <p class="p-3 bg-light rounded">[Problem Description Response]</p>
                    </div>
                    <div class="col-12">
                        <label class="form-label text-muted">Target Audience</label>
                        <p class="p-3 bg-light rounded">[Target Audience Response]</p>
                    </div>
                    <div class="col-12">
                        <label class="form-label text-muted">Market Gap</label>
                        <p class="p-3 bg-light rounded">[Market Gap Response]</p>
                    </div>
                    <div class="col-12">
                        <label class="form-label text-muted">Solution Summary</label>
                        <p class="p-3 bg-light rounded">[Solution Summary Response]</p>
                    </div>
                    <div class="col-12">
                        <label class="form-label text-muted">Proof Documents</label>
                        <div class="d-flex align-items-center p-3 border rounded">
                            <i class="fas fa-file-pdf text-danger fa-2x me-3"></i>
                            <div class="flex-grow-1">
                                <h6 class="mb-0">Ideation Workshop Outputs.pdf</h6>
                                <small class="text-muted">1.2 MB</small>
                            </div>
                            <button class="btn btn-primary btn-sm">
                                <i class="fas fa-download"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Market Section -->
        <div class="response-card mb-4 animate__animated animate__fadeIn">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-chart-pie text-primary me-2"></i>
                    Market
                </h5>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-12">
                        <label class="form-label text-muted">Target Market Size</label>
                        <p class="p-3 bg-light rounded">[Target Market Size Response]</p>
                    </div>
                    <div class="col-12">
                        <label class="form-label text-muted">Demographics</label>
                        <p class="p-3 bg-light rounded">[Demographics Response]</p>
                    </div>
                    <div class="col-12">
                        <label class="form-label text-muted">Market Analysis Proof</label>
                        <div class="d-flex align-items-center p-3 border rounded">
                            <i class="fas fa-file-excel text-success fa-2x me-3"></i>
                            <div class="flex-grow-1">
                                <h6 class="mb-0">Market Analysis Report.xlsx</h6>
                                <small class="text-muted">2.4 MB</small>
                            </div>
                            <button class="btn btn-primary btn-sm">
                                <i class="fas fa-download"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Idea Section -->
        <div class="response-card mb-4 animate__animated animate__fadeIn">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-brain text-success me-2"></i>
                    Idea
                </h5>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-12">
                        <label class="form-label text-muted">Solution Structure</label>
                        <p class="p-3 bg-light rounded">[Detailed Solution Structure Response]</p>
                    </div>
                    <div class="col-12">
                        <label class="form-label text-muted">Solution Proof</label>
                        <div class="d-flex align-items-center p-3 border rounded">
                            <i class="fas fa-file-image text-info fa-2x me-3"></i>
                            <div class="flex-grow-1">
                                <h6 class="mb-0">Solution Wireframes.png</h6>
                                <small class="text-muted">3.5 MB</small>
                            </div>
                            <button class="btn btn-primary btn-sm">
                                <i class="fas fa-download"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Shark Tank Section -->
        <div class="response-card mb-4 animate__animated animate__fadeIn">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-chart-line text-danger me-2"></i>
                    Market Analysis and Value Proposition
                </h5>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-12">
                        <label class="form-label text-muted">Competitor Analysis</label>
                        <p class="p-3 bg-light rounded">[Competitor Analysis Response]</p>
                    </div>
                    <div class="col-12">
                        <label class="form-label text-muted">Value Statement</label>
                        <p class="p-3 bg-light rounded">[Value Statement Response]</p>
                    </div>
                    <div class="col-12">
                        <label class="form-label text-muted">Customer Experience Map</label>
                        <p class="p-3 bg-light rounded">[Customer Experience Map Response]</p>
                    </div>
                    <div class="col-12">
                        <label class="form-label text-muted">Revenue Description</label>
                        <p class="p-3 bg-light rounded">[Revenue Description Response]</p>
                    </div>
                    <div class="col-12">
                        <label class="form-label text-muted">SWOT Analysis</label>
                        <p class="p-3 bg-light rounded">[SWOT Analysis Response]</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- In-House Section -->
        <div class="response-card mb-4 animate__animated animate__fadeIn">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-building text-info me-2"></i>
                    Operational and Branding Information
                </h5>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-12">
                        <label class="form-label text-muted">Staffing Plan</label>
                        <p class="p-3 bg-light rounded">[Staffing Plan Response]</p>
                    </div>
                    <div class="col-12">
                        <label class="form-label text-muted">Branding Strategy</label>
                        <p class="p-3 bg-light rounded">[Branding Strategy Response]</p>
                    </div>
                    <div class="col-12">
                        <label class="form-label text-muted">Marketing Channels</label>
                        <p class="p-3 bg-light rounded">[Marketing Channels Response]</p>
                    </div>
                    <div class="col-12">
                        <label class="form-label text-muted">Goals Plan</label>
                        <p class="p-3 bg-light rounded">[Goals Plan Response]</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- LIVE Show Section -->
        <div class="response-card mb-4 animate__animated animate__fadeIn">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-rocket text-warning me-2"></i>
                    Launch and Sales Information
                </h5>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-12">
                        <label class="form-label text-muted">Launch Plan</label>
                        <p class="p-3 bg-light rounded">[Launch Plan Response]</p>
                    </div>
                    <div class="col-12">
                        <label class="form-label text-muted">Sales Strategies</label>
                        <p class="p-3 bg-light rounded">[Sales Strategies Response]</p>
                    </div>
                    <div class="col-12">
                        <label class="form-label text-muted">Customer Validation</label>
                        <p class="p-3 bg-light rounded">[Customer Validation Response]</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- The Boring Stuff Section -->
        <div class="response-card mb-4 animate__animated animate__fadeIn">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-file-contract text-secondary me-2"></i>
                    Financial and Compliance Information
                </h5>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-12">
                        <label class="form-label text-muted">Financial Statements</label>
                        <p class="p-3 bg-light rounded">[Financial Statements Response]</p>
                    </div>
                    <div class="col-12">
                        <label class="form-label text-muted">Compliance Documents</label>
                        <p class="p-3 bg-light rounded">[Compliance Documents Response]</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scale Up Section -->
        <div class="response-card mb-4 animate__animated animate__fadeIn">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-chart-bar text-primary me-2"></i>
                    Growth and Funding Strategy
                </h5>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-12">
                        <label class="form-label text-muted">Scaling Plan</label>
                        <p class="p-3 bg-light rounded">[Scaling Plan Response]</p>
                    </div>
                    <div class="col-12">
                        <label class="form-label text-muted">Funding Strategy</label>
                        <p class="p-3 bg-light rounded">[Funding Strategy Response]</p>
                    </div>
                    <div class="col-12">
                        <label class="form-label text-muted">Strategic Plan</label>
                        <p class="p-3 bg-light rounded">[Strategic Plan Response]</p>
                    </div>
                    <div class="col-12">
                        <label class="form-label text-muted">Growth Metrics</label>
                        <div class="d-flex align-items-center p-3 border rounded">
                            <i class="fas fa-file-powerpoint text-danger fa-2x me-3"></i>
                            <div class="flex-grow-1">
                                <h6 class="mb-0">Growth Strategy Deck.pptx</h6>
                                <small class="text-muted">5.8 MB</small>
                            </div>
                            <button class="btn btn-primary btn-sm">
                                <i class="fas fa-download"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>


@endsection