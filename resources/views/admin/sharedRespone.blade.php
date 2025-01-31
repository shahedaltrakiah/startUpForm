@extends('layouts.adminHeader')

@section('adminContent')

<!-- Header Section -->
<div class="content-header mb-4 d-flex justify-content-between">
    <h1 class="h3">Name of Startup</h1>
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
                <textarea id="commentText" class="form-control" placeholder="Write your comment here..."></textarea>
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
        <div class="response-card mb-4 animate__animated animate__fadeIn">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-lightbulb text-warning me-2"></i>
                    Ideation
                </h5>
            </div>
            <div class="card-body">
                <p class="p-3 bg-light rounded">[Problem Description Response]</p>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const commentText = document.getElementById("commentText");
    const saveCommentBtn = document.getElementById("saveComment");
    const commentsSection = document.getElementById("commentsSection");
    let editMode = false;
    let currentComment = null;

    // Open "Add Comment" modal in create mode
    document.getElementById("addCommentBtn").addEventListener("click", function () {
        editMode = false;
        commentText.value = "";
        saveCommentBtn.textContent = "Save";
    });

    // Save or update comment
    saveCommentBtn.addEventListener("click", function () {
        const text = commentText.value.trim();
        if (!text) return;

        if (editMode && currentComment) {
            // Update existing comment
            currentComment.querySelector("span").textContent = text;
        } else {
            // Create new comment
            const commentHTML = `
                <div class="alert alert-secondary d-flex justify-content-between align-items-center">
                    <span>${text}</span>
                    <div>
                        <button class="btn btn-sm btn-outline-primary edit-comment">Edit</button>
                        <button class="btn btn-sm btn-outline-danger delete-comment">Delete</button>
                    </div>
                </div>
            `;
            commentsSection.insertAdjacentHTML("afterbegin", commentHTML);
        }

        // Reset modal and close it
        commentText.value = "";
        document.querySelector("#commentModal .btn-close").click();
        editMode = false;
        currentComment = null;
    });

    // Handle Edit/Delete functionality
    commentsSection.addEventListener("click", function(e) {
        if (e.target.classList.contains("delete-comment")) {
            e.target.closest(".alert").remove();
        }

        if (e.target.classList.contains("edit-comment")) {
            editMode = true;
            currentComment = e.target.closest(".alert");
            commentText.value = currentComment.querySelector("span").textContent;
            saveCommentBtn.textContent = "Update";
            new bootstrap.Modal(document.getElementById("commentModal")).show();
        }
    });
});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

@endsection
