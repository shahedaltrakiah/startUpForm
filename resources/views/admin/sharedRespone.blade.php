@extends('layouts.guestHeader')

@section('adminContent')

<!-- Header Section -->
<div class="content-header mb-4 d-flex justify-content-between">
    <h1 class="h3 mb-0">{{ $response->startup_name }}</h1>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#commentModal" id="addCommentBtn">
        <i class="fa-solid fa-plus"></i> Add Comment
    </button>
</div>

<!-- Comments Section -->
<div id="commentsSection" class="mb-4">
    <!-- Comments will be inserted here -->
</div>

<!-- Comment Modal -->
<div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="commentModalLabel">Add Comment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input id="nameText" type="text" class="form-control" placeholder="Your Name">
                <input id="emailText" type="email" class="form-control mt-3" placeholder="Your Email">
                <textarea id="commentText" class="form-control mt-3"
                    placeholder="Write your comment here..."></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveComment">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Existing Sections -->
<div class="row">
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

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const commentText = document.getElementById("commentText");
        const nameText = document.getElementById("nameText");
        const emailText = document.getElementById("emailText");
        const saveCommentBtn = document.getElementById("saveComment");
        const commentsSection = document.getElementById("commentsSection");
        let editMode = false;
        let currentComment = null;

        document.getElementById("addCommentBtn").addEventListener("click", function () {
            editMode = false;
            commentText.value = "";
            nameText.value = "";
            emailText.value = "";
            saveCommentBtn.textContent = "Save";
        });

        saveCommentBtn.addEventListener("click", function () {
            const commentValue = commentText.value.trim();
            const nameValue = nameText.value.trim();
            const emailValue = emailText.value.trim();

            if (!commentValue || !nameValue || !emailValue) return;

            if (editMode && currentComment) {
                currentComment.querySelector(".comment-name").textContent = nameValue;
                currentComment.querySelector(".comment-email").textContent = emailValue;
                currentComment.querySelector(".comment-text").textContent = commentValue;
            } else {
                const commentHTML = `
                <div class="alert alert-secondary d-flex justify-content-between align-items-center">
                    <div>
                        <strong class="comment-name">${nameValue}</strong> (<span class="comment-email">${emailValue}</span>) 
                        <p class="comment-text">${commentValue}</p>
                    </div>
                    <div>
                        <button class="btn btn-sm btn-outline-primary edit-comment">Edit</button>
                        <button class="btn btn-sm btn-outline-danger delete-comment">Delete</button>
                    </div>
                </div>
            `;
                commentsSection.insertAdjacentHTML("afterbegin", commentHTML);
            }

            commentText.value = "";
            nameText.value = "";
            emailText.value = "";
            document.querySelector("#commentModal .btn-close").click();
            editMode = false;
            currentComment = null;
        });

        commentsSection.addEventListener("click", function (e) {
            if (e.target.classList.contains("delete-comment")) {
                e.target.closest(".alert").remove();
            }

            if (e.target.classList.contains("edit-comment")) {
                editMode = true;
                currentComment = e.target.closest(".alert");
                nameText.value = currentComment.querySelector(".comment-name").textContent;
                emailText.value = currentComment.querySelector(".comment-email").textContent;
                commentText.value = currentComment.querySelector(".comment-text").textContent;
                saveCommentBtn.textContent = "Update";
                new bootstrap.Modal(document.getElementById("commentModal")).show();
            }
        });
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

@endsection