@extends('layouts.adminHeader')

@section('adminContent')

<!-- Header Section -->
<div class="content-header mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3 mb-0">{{ $response->startup_name }}</h1>
        </div>
    </div>
</div>

<!-- Response Sections -->
<div class="row">
    <!-- Action Buttons -->
    <div class="d-flex justify-content-end mb-4">
        <div class="d-flex gap-2">
            <a href="https://www.bing.com/ck/a?!&&p=e8f386a812aa2210d23cc30855db85425457863da6083b79139edd5b379da7f0JmltdHM9MTczODk3MjgwMA&ptn=3&ver=2&hsh=4&fclid=312d21c3-1c2a-62dd-265d-322d1df863fe&psq=gmail&u=a1aHR0cHM6Ly9tYWlsLmdvb2dsZS5jb20vbWFpbA&ntb=1"
                class="btn btn-outline-primary contact-btn">
                <i class="fas fa-envelope me-2"></i>Contact Startup
            </a>
            <button class="btn btn-success approve-btn" data-id="{{ $response->id }}">
                <i class="fas fa-check me-2"></i>Approve
            </button>
        </div>
    </div>

    <div class="col-12">
        <!-- Sections Loop for Each Section -->
        @foreach ($response->answers->groupBy('question.section_id') as $sectionId => $answers)
                @php
                    $section = \App\Models\Section::find($sectionId);
                @endphp
                <div class="response-card mb-4 animate__animated animate__fadeIn">
                    <!-- Section Header -->
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-lightbulb text-warning me-2"></i>
                            {{ $section->name }} <!-- Section Name -->
                        </h5>
                    </div>

                    <!-- Card Body with Questions and Answers -->
                    <div class="card-body">
                        <div class="row g-4">
                            @foreach ($answers as $answer)
                                <div class="col-12 mb-3">
                                    <!-- Display Question -->
                                    <label class="form-label text-muted">{{ $answer->question->question_text }}:</label>
                                    <p class="p-3 bg-light rounded">{{ $answer->answer_text }}</p>

                                    <!-- Display Proof Link if Available -->
                                    @if ($answer->answer_text && $answer->question->proof)
                                        <div class="col-12">
                                            <label class="form-label text-muted">Proof:</label>
                                            <input type="url" class="form-control" value="{{ $answer->question->proof }}" readonly />
                                        </div>
                                    @endif
                                </div>
                                <!-- Proof for the Response if Available -->
                                @if ($answer->proof)
                                    <div class="col-12">
                                        <label class="form-label text-muted">Response Proof</label>
                                        <p class="p-3 bg-light rounded">
                                            <a href="{{ $answer->proof->proof_value }}"
                                                target="_blank">{{ $answer->proof->proof_value }}</a>
                                        </p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
        @endforeach
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).on('click', '.approve-btn', function () {
        let responseId = $(this).data('id');

        $.ajax({
            url: `/admin/response/approve/${responseId}`,
            type: 'GET',
            success: function (response) {
                alert('Response approved!');
                location.reload();
            },
            error: function () {
                alert('Error approving response!');
            }
        });
    });
</script>

@endsection